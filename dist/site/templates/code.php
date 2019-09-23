<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * This template is responsible for rendering all the subpages of the `notes` page.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
  <article class="note">
    <header class="note-header intro">
      <h1><?= $page->title() ?></h1>
      <time class="note-date"><?= $page->date()->toDate('d / M / Y') ?></time>
    </header>

    <div class="note-text text">
      <?php echo $page->text()->kt() ?>
    </div>

    <div class="note-code">
      <?php echo $page->embedcode()->kt() ?>
    </div>

    <?php if ($page->tags()->isNotEmpty()) : ?>
      <ul class="note-tags tags">
        <?php
          $tags = $page->tags()->split(',');
          foreach ($tags as $tag) :
        ?>
          <li>
            <a href="<?php echo url('notes', ['params' => ['tag' => $tag]]) ?>">
              <?php echo $tag; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif ?>
  </article>
</main>

<?php snippet('footer') ?>
