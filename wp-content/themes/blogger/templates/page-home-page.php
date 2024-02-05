<?php
/*
Template Name: Home Page
*/
get_header();
?>

<section class="most_viewed_posts">
    <div class="container_fluid">
        <div class="row">
            <div class="most_viewed_posts_wrap">
                <?php
                $args = array(
                    'posts_per_page' => 5, // Retrieve only 5 posts
                    'meta_key' => 'post_views', // Use the post views meta key
                    'orderby' => 'meta_value_num', // Order by the numeric value of post views
                    'order' => 'DESC', // Descending order (highest views first)
                );

                $top_posts_query = new WP_Query($args);
                if ($top_posts_query->have_posts()) {
                    while ($top_posts_query->have_posts()) {
                        $top_posts_query->the_post();

                        // Get post data
                        $post_id = get_the_ID();
                        $post_title = get_the_title();
                        $post_date = get_the_date();
                        $post_author = get_the_author();
                        $post_content = get_the_excerpt();
                        $post_content_excerpt = wp_trim_words(get_the_content(), 20, '...');
                        if (has_post_thumbnail()) {
                            $post_thumbnail_id = get_post_thumbnail_id($post_id);
                            $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                        } else {
                            // If no featured image is set, you can set a default image URL
                            $post_thumbnail_url = ''; // Set your default image URL here
                        }
                        ?>
                        <div class="single_most_viewed_post">
                            <div class="single_post_inner">
                                <div class="single_post_img">
                                    <div class="single_post_img_inner">
                                        <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php echo $post_title; ?>">
                                    </div>
                                </div>
                                <div class="single_post_info">
                                    <h2 class="single_post_title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo $post_title; ?>
                                        </a>
                                    </h2>
                                    <p class="single_post_excerpt">
                                        <?php echo $post_content_excerpt; ?>
                                    </p>
                                    <div class="single_post_meta">
                                        <ul>
                                            <li><i class="fa-solid fa-user" aria-hidden="true"></i>
                                                <?php echo $post_author; ?>
                                            </li>
                                            <li><i class="fa-light fa-tags" aria-hidden="true"></i>
                                                <?php echo $post_author; ?>
                                            </li>
                                            <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i>
                                                <?php echo $post_date; ?>
                                            </li>
                                            <li><i class="fa-regular fa-eye" aria-hidden="true"></i>
                                                <?php display_post_views(); ?> views
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

            </div>
        </div>
    </div>
</section>
<section class="all_blogs">
      <div class="container_fluid">
        <div class="row">
          <div class="all_blogs_col">
            <div class="heading_all_blogs">
              <h2>all blogs</h2>
            </div>
            <div class="all_blogs_wrap">
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single_blog_col">
                <div class="single_blog_inner">
                  <div class="blog_img">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Who-Can-Study-B-Pharmacy_.jpg" alt="" />
                  </div>
                  <div class="blog_content">
                    <h2 class="single_post_title">Who Can Study B Pharmacy?</h2>
                    <p class="single_post_excerpt">
                      The field of Pharmacy, a dynamic and vital component of
                      healthcare, invites aspiring individuals to...
                    </p>
                    <div class="single_blog_meta">
                      <ul>
                        <li><i class="fa-solid fa-user" aria-hidden="true"></i> Christo Pinto</li>
                        <li><i class="fa-light fa-tags" aria-hidden="true"></i> <a href="#">Education</a></li>
                        <li><i class="fa-regular fa-calendar-days" aria-hidden="true"></i> 29 Jan 2024</li>
                        <li><i class="fa-regular fa-eye" aria-hidden="true"></i> 48</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="all_category_col">
            <div class="heading_all_blogs">
              <h2>category</h2>
            </div>
            <div class="sticky_category_block">
              <div class="category_block_inner">
                <ul>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Accounting</span
                      ><span class="cat_count">49</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">Advanced SEO</span
                      ><span class="cat_count">13</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="cat_name">AI/ML</span
                      ><span class="cat_count">2</span></a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php

get_footer(); ?>