<script setup>
  import { inertia, page } from "@inertiajs/svelte";

  const props = $page.props;
</script>

<header
  style="display: flex; align-items: center; justify-content: space-between"
>
  <a use:inertia href="/">
    <h1>{props.site.name}</h1>
  </a>

  <nav>
    <a use:inertia href="/this-page-does-not-exist">404 Page</a>
    <a use:inertia style="margin-left: 1rem" href="/sample-page">Sample Page</a>
  </nav>
</header>

<style></style>
