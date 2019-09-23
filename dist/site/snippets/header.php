<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates.
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file.
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
  <?php echo css(['assets/css/index.css', 'assets/css/prism.css', '@auto']) ?>

</head>
<body>

  <div class="page">
    <header class="header">
      <!-- In this link we call `$site->url()` to create a link back to the homepage -->
      <a class="logo" href="<?= $site->url() ?>">
      <svg viewBox="0 0 683 272" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="1.5">
  <path d="M264.906 6.553L7.004 264.454M328.932 106.504l-127.433 128.95M328.717 262.696l126.675-128.192 128.193 129.709" fill="none" stroke="#000" stroke-width="12"/>
  <path d="M632.491 177.497l110.745 106.195" fill="none" stroke="#000" stroke-width="12.62" transform="matrix(.92276 0 0 .9788 -102.52 -112.93)"/>
</svg>
      </a>

      <nav id="menu" class="menu">
        <?php
        // In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
        // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
        // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
        foreach ($site->children()->listed() as $item): ?>
        <?= $item->title()->link() ?>
        <?php endforeach ?>
      </nav>
    </header>

