<!-- Declare Variables We Will Use -->
<?php if(is_single()): ?>
  <?php 
    global $post; 
    $the_post_content = $post->post_content;
    $the_post_excerpt = substr( $the_post_content, 0, 250 );
    $author = get_the_author(); 
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
  ?>
  
  <!-- Article Structured Data JSON-->
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "https://google.com/article"
    },
    "headline": "<?php echo $post->post_title ?>",
    "image": [
      "<?php echo $image[0] ?>"
     ],
    "datePublished": "<?php echo $post->post_date ?>",
    "dateModified": "<?php echo $post->post_modified ?>",
    "author": {
      "@type": "Person",
      "name": "<?php echo $author ?>"
    },
     "publisher": {
      "@type": "Organization",
      "name": "[Enter The Name Of Your Organization/Website]",
      "logo": {
        "@type": "ImageObject",
        "url": " [Enter The URL Of Your Website Logo] "
      }
    },
    "description": "<?php echo $the_post_excerpt . '...' ?>"
  }
  </script>
<?php endif; ?>