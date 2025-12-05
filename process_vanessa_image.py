"""Process Vanessa's portrait into a LinkedIn-style professional headshot.

Steps:
1. Load original image.
2. Attempt background removal (rembg). If unavailable, fall back to original.
3. Square crop (centered, slight upward bias) -> 800x800.
4. Apply gentle clarity enhancement.
5. Composite subject over neutral gradient background (#101112 -> #202224).
6. Add soft circular vignette + subtle shadow.
7. Save as vanessa-wolf-headshot.png
"""

from pathlib import Path
from math import floor
from PIL import Image, ImageEnhance, ImageFilter

try:
    from rembg import remove  # type: ignore
    REMBG_AVAILABLE = True
except Exception:
    REMBG_AVAILABLE = False

images_dir = Path('trillium-wp-theme/assets/images')
source = images_dir / 'vanessa-wolf.png'
if not source.exists():
    source = images_dir / 'vanessa-wolf.jpg'
if not source.exists():
    raise SystemExit('Vanessa image not found.')

orig = Image.open(source).convert('RGBA')
w, h = orig.size

# Attempt background removal for cleaner headshot.
if REMBG_AVAILABLE:
    try:
        removed = remove(orig)
        subject = removed
    except Exception:
        subject = orig
else:
    subject = orig

# Square crop tighter to minimize background distractions
side = min(w, h)
crop_side = int(side * 0.72)
left = (w - crop_side) // 2
top = (h - crop_side) // 2
right = left + crop_side
bottom = top + crop_side

subject_crop = subject.crop((left, top, right, bottom)).resize((800, 800), Image.LANCZOS)

# Enhancement tweaks
subject_crop = ImageEnhance.Contrast(subject_crop).enhance(1.05)
subject_crop = ImageEnhance.Sharpness(subject_crop).enhance(1.08)
subject_crop = ImageEnhance.Brightness(subject_crop).enhance(1.04)

final_w = final_h = 800

# Neutral soft gradient similar to Amy's styling
bg = Image.new('RGBA', (final_w, final_h), (255,255,255,0))
grad = Image.new('RGBA', (final_w, final_h))
grad_px = grad.load()
from math import floor
top_color = (255,255,255)
bottom_color = (242,242,242)
for y in range(final_h):
    t = y/(final_h-1)
    r = floor(top_color[0] + (bottom_color[0]-top_color[0])*t)
    g = floor(top_color[1] + (bottom_color[1]-top_color[1])*t)
    b = floor(top_color[2] + (bottom_color[2]-top_color[2])*t)
    for x in range(final_w):
        grad_px[x,y] = (r,g,b,255)

# Build elliptical mask to isolate subject center and fully replace original background
mask = Image.new('L', (final_w, final_h), 0)
mx = mask.load()
cx = cy = final_w/2
radius_x = final_w*0.46
radius_y = final_h*0.46
for y in range(final_h):
    for x in range(final_w):
        dx = (x-cx)/radius_x
        dy = (y-cy)/radius_y
        d = dx*dx + dy*dy
        if d <= 1:
            # feather edge
            edge = 1 - d
            alpha_val = int(255 * (edge if edge < 0.12 else 1))
            if alpha_val > 255: alpha_val = 255
            mx[x,y] = alpha_val

# Composite subject over gradient using mask (hides distracting background)
subject_rgba = subject_crop.copy()
subject_rgba.putalpha(mask)

# Shadow beneath
alpha_mask = mask.filter(ImageFilter.GaussianBlur(28))
shadow_layer = Image.new('RGBA', (final_w, final_h), (0,0,0,0))
sl = shadow_layer.load(); am = alpha_mask.load()
for y in range(final_h):
    for x in range(final_w):
        a = am[x,y]
        if a > 0:
            sl[x,y] = (0,0,0,int(a*0.22))

composite = Image.alpha_composite(grad, shadow_layer)
composite = Image.alpha_composite(composite, subject_rgba)

out_path = images_dir / 'vanessa-wolf-headshot.png'
composite.save(out_path)
print('Saved cleaned headshot (gradient background) ->', out_path)
print('Background removal lib available:', REMBG_AVAILABLE)
