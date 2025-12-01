// Step 1 — Add CSS + JS CDN inside header.php

// Before </head> add:

<link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
<script src="https://unpkg.com/kursor"></script>

// Step 2 — Add script inside footer.php

Before </body> add:

<script>
new kursor({
    type: 1,
    color: '#64BE44',
    removeDefaultCursor: false,
})
</script>


// Save → refresh website → cursor works.
