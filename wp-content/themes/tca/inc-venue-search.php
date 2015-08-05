<?php global $typeSelect, $regionSelect, $sizeSelect, $venueSelect, $venueKey ; ?>
<div class="mobile-accoridan">
	<button>OPEN FILTER</button>
</div>
<form action="<?php echo home_url('/'); ?>venue-search/" method="get" id="venue-search">
        	<div id="filter">
        		
                <ul>
                    <li>
                        <label>EVENT TYPE</label>
                        <div class="form-ctrl-wrap select-wrap select-wrap-venue">
                            <select class="chosen-select" id="ven_type" name="venue_type">
                                <option value="All">All Event Types</option>
	                              <?php $terms = get_terms('event-type'); foreach($terms as $term) { ?>
	                              	<option value="<?php echo $term->slug; ?>" <?php if($term->slug == $typeSelect) { echo 'selected="selected"'; }?>><?php echo $term->name; ?></option>
	                              <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>REGION</label>
                        <div class="form-ctrl-wrap select-wrap select-wrap-venue">
                            <select class="chosen-select" id="ven_region" name="venue_region">
                                <option value="All">All Regions</option>
                                <?php $terms = get_terms('region'); foreach($terms as $term) { ?>
	                            	<option value="<?php echo $term->slug; ?>" <?php if($term->slug == $regionSelect) { echo 'selected="selected"'; }?>><?php echo $term->name; ?></option>
	                            <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>EVENT SIZE</label>
                        <div class="form-ctrl-wrap select-wrap select-wrap-venue">
                            <select class="chosen-select" id="ven_size" name="venue_size">
                             <option value="All">All Sizes</option>
                                <?php $terms = get_terms('event-size'); foreach($terms as $term) { ?>
	                            	<option value="<?php echo $term->slug; ?>" <?php if($term->slug == $sizeSelect) { echo 'selected="selected"'; }?>><?php echo $term->name; ?></option>
	                            <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>STYLE</label>
                        <div class="form-ctrl-wrap select-wrap select-wrap-venue">
                            <select class="chosen-select" id="ven_style" name="venue_style">>
                               <option value="All">All Styles</option>
                                <?php $terms = get_terms('venue-style'); foreach($terms as $term) { ?>
	                            	<option value="<?php echo $term->slug; ?>" <?php if($term->slug == $venueSelect) { echo 'selected="selected"'; }?>><?php echo $term->name; ?></option>
	                            <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>KEYWORD</label>
                        <div class="keyword-search">
                            <input type="text" name="search_venue" placeholder="Enter keyword" value="<?php the_search_query(); ?>"/>
                        </div>
                    </li>

                </ul>
             <div class="submit-wrap"> <input type="submit"  value="Search"/></div>
            </div> <!-- End filter -->
            </form>
            
        