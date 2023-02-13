<script>
  import { page } from "@inertiajs/svelte";

  const props = $page.props;
</script>

<article>
  <h1>Single Post:</h1>
  <h3>{props.post.post_title}</h3>
  <div>
    {@html props.post.post_content}
  </div>
</article>

<style></style>
