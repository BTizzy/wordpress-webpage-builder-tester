
import xml.etree.ElementTree as ET

# Parse the WordPress XML export
tree = ET.parse('trilliumhiring.WordPress.2025-10-26.xml')
root = tree.getroot()

# Namespace handling for WordPress XML
namespaces = {
    'content': 'http://purl.org/rss/1.0/modules/content/',
    'wp': 'http://wordpress.org/export/1.2/',
    'excerpt': 'http://wordpress.org/export/1.2/excerpt/'
}

# Extract all pages and posts
pages = []
for item in root.findall('.//item'):
    post_type = item.find('wp:post_type', namespaces)
    post_status = item.find('wp:status', namespaces)
    
    if post_type is not None and post_status is not None:
        if post_status.text == 'publish' and post_type.text in ['page', 'post']:
            title = item.find('title')
            content = item.find('content:encoded', namespaces)
            post_name = item.find('wp:post_name', namespaces)
            
            pages.append({
                'type': post_type.text,
                'title': title.text if title is not None and title.text else 'Untitled',
                'slug': post_name.text if post_name is not None and post_name.text else '',
                'content_length': len(content.text) if content is not None and content.text else 0
            })

print(f"Total published pages/posts found: {len(pages)}\n")
for i, page in enumerate(pages, 1):
    print(f"{i}. {page['type'].upper()}: {page['title']}")
    print(f"   Slug: {page['slug']}")
    print(f"   Content length: {page['content_length']} chars\n")
