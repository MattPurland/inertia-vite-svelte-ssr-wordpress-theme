<script setup>
  import { page } from "@inertiajs/svelte";

  const props = $page.props;
</script>

<section>
  <h1>Page:</h1>
  <h3>{props.page.post_title}</h3>
  <div>{@html props.page.post_content}</div>
</section>

<style></style>
