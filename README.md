# WordPress Dynamic Gutenberg Block

A professional, PHP-first boilerplate for registering dynamic, server-side rendered Gutenberg blocks in WordPress without requiring a JavaScript build process (e.g., React, Webpack).

This block is designed to be included in a theme's `functions.php` file and provides a clean, scalable structure for adding multiple custom blocks.

## ✨ Features

* **PHP-First:** Leverages `block.json` and `register_block_type_from_metadata()` for registration.
* **No Build Step:** Requires no Node.js, `npm`, or React compilation.
* **Server-Side Rendered:** All block output is rendered via PHP, making it perfect for dynamic content like "Latest Posts."
* **Scalable:** Easily add new blocks by simply creating a new folder in `/blocks/`.
* **Standards-Compliant:** Follows modern WordPress block registration standards.

---

## 🚀 How to Use

1.  **Download:** Clone or download this repository.
2.  **Include:** Copy the entire `dynamic-gutenberg-block-register` folder into your theme's directory (e.g., `/wp-content/themes/your-theme/dynamic-gutenberg-block-register/`).
3.  **Load:** Add the following line to your theme's `functions.php` file:

    ```php
    // Load the dynamic block utility
    require_once get_template_directory() . '/dynamic-gutenberg-block-register/load.php';
    ```

4.  **Done:** Go to the WordPress Block Editor. You will find the "Latest Posts (Hussainas)" block in the 'Widgets' category, ready to use.

---

## 🛠️ How to Add a New Block

Adding another block is simple:

1.  Create a new subdirectory inside the `/blocks/` folder (e.g., `/blocks/my-new-block/`).
2.  Inside your new folder, create a `block.json` file. Define your block's `name`, `title`, `icon`, and `attributes`.
3.  Set the `render` property in your `block.json` to point to a PHP file:
    `"render": "file:./render.php"`
4.  Create that `render.php` file inside your block's folder.
5.  Write your PHP logic in `render.php` to output the block's HTML. This script will automatically receive the `$attributes` variable.

The utility will automatically find and register your new block.

---

## ⚖️ License

This project is open-source and available under the [MIT License](LICENSE).
