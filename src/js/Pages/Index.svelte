<script setup>
  import { page, inertia } from "@inertiajs/svelte";

  const props = $page.props;
</script>

<section>
  <h1>List of Posts:</h1>

  {#each props.posts as post (post.ID)}
    <article>
      <a use:inertia href={post.post_name}>
        <h3>{post.post_title}</h3>
      </a>
    </article>
  {/each}
</section>

<style></style>
