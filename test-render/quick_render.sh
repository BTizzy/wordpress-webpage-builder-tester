#!/bin/bash
cd ~/The-Claw/v9-build/test-render
mkdir -p screenshots
pkill -f "php -S 127.0.0.1:8765" 2>/dev/null
sleep 1
php -S 127.0.0.1:8765 render.php > /tmp/v9server.log 2>&1 &
SERVER_PID=$!
sleep 2

# Quick visual test that captures screenshots
python3 visual_test.py 2>&1 | tail -40
echo ""
echo "=== Screenshots produced ==="
ls -la screenshots/

kill $SERVER_PID 2>/dev/null
