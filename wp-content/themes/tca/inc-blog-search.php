       <div class="post-filter-wrap">

        <div class="post-filter">
         <?php global $termSelect, $keyword; ?>
       		<form action="<?php echo home_url('/'); ?>blog-search/" method="get">
            	<ul>
                	<li>
                        <label>CATEGORY</label>
                        <div class="form-ctrl-wrap select-wrap">
                        <?php $terms = get_terms('blog-category', 'orderby=name'); ?>
                               <?php // echo '<pre>'; print_r($terms); echo '</pre>'; ?>
                            <select class="chosen-select " id="blog_cat" name="blog-categories">
                                <option value="All">All Categories</option>
                               
                               <?php foreach($terms as $term) { ?>
                               
                            	   <option value="<?php echo $term->slug; ?>" <?php if($term->slug == $termSelect) { echo 'selected="selected"'; }?>><?php echo $term->name; ?></option>
                               <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                    
                    	<label>SEARCH</label>
                        <div class="form-ctrl-wrap blog-search-input">
                            <input type="text" placeholder="Search all entries" name="search_keyword" value="<?php the_search_query(); ?>"/>
                           
                        </div>
                    </li>
                   
                
                </ul>
                 <div class="submit-wrap"> <input type="submit" value="Search"/></div>
          </form>
        </div>
    </div>