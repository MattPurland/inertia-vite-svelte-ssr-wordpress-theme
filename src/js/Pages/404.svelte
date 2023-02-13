<script>
  import { page } from "@inertiajs/svelte";

  const props = $page.props;
</script>

<section>
  <h1>404:</h1>
  <h3>{@html props.content}</h3>
</section>

<style></style>
