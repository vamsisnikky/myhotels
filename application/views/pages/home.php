<div id="banner-cicle">
    <div class="green-circle">
        <div align="center"><span class="grn-srch">Search</span></div>
        <form action="search.html" method="post">
            <div class="row">
                <select name="iCity" id="vCountry"  required>
                    <option value="" selected="" disabled="" />Select City
                    <?php if (isset($cities) && $cities != NULL){ ?>
                    <?php foreach ($cities as $city) { ?>
                        <option value=<?php echo $city['iCityId'] ?>><?php echo $city['vCityName'] ?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="row">
                <div class="half-brick">
                    <label>Check In</label><br />
                    <input type="text" name="checkin"  id="checkin"/>
                </div>
                <div class="half-brick no-margn">
                    <label>Check Out</label>
                    <input type="text" name="checkout"  id="checkout"/>
                </div>
            </div>
            <div class="row">
                <div class="three-brick">
                    <label>Adults</label>
                    <select name="iAdult" id="adult"  required>
                        <option value="1" selected >1</option>
                        <option value="2"  >2</option>
                        <option value="3"  >3</option>
                        <option value="4"  >4</option>
                        <option value="5"  >5</option>
                        <option value="6"  >6</option>
                    </select>
                </div>
                <div class="three-brick">
                    <label>Children</label>
                    <select name="iChild" id="child"  required>
                        <option value="0" selected >0</option>
                        <option value="1"  >1</option>
                        <option value="2"  >2</option>
                        <option value="3"  >3</option>
                        <option value="4"  >4</option>
                    </select>
                </div>
                
                <div class="three-brick three-brick-last">
                    <label>Sort by</label>
                    <select><option>5 Star to 1 Star</option></select>
                </div>
            </div>
            <div class="row" align="center"><input type="submit" name="search" value="Check Availability" /></div>
        </form>
    </div>
</div>
</div>    

<!-- Middle -->
<div id="middle">
    <div class="big-centr">
        <h2>India's leading online travel company.<br /> Great experiences at lowest prices guaranteed..                 .</h2>
    </div>
    <div class="mid-circles">
        <ul>
            <?php if (isset($offers) && $offers != NULL): ?>
                <a href="<?php echo $offers[0]['vUrl']; ?>" target="_blank">
                    <li class="frst">
                        <div class="img-div">
                            <div class="hover-bordr"></div>

                            <img src="<?php echo base_url();?>assets/upload/<?php echo $offers[0]['vImage']; ?>" alt="" />
                        </div>
                        <h3>Special Offers</h3>
                        <h4><?php echo $offers[0]['vTitle']; ?> </h4>
                        <p> <?php echo $offers[0]['vDescription'] ?> </p>
                    </li>
                </a>
            <?php endif; ?>
            <li class="scnd">
                <div class="img-div">
                    <div class="hover-bordr"></div>
                    <img src="<?php echo base_url();?>assets/images/img-2.jpg" alt="" />
                </div>
                <h3>Our Rooms</h3>
                <p>Lorem ipsum dolor sit amet, consectetur<br /> adipiscing elit.Ut ultrices leo eget <br />sem gravida ornare.</p>
            </li>
            <li class="last no-margn">
                <div class="img-div">
                    <div class="hover-bordr"></div>
                    <img src="<?php echo base_url();?>assets/images/img-3.jpg" alt="" />
                </div>
                <h3>Restaurant</h3>
                <p>Lorem ipsum dolor sit amet, consectetur<br /> adipiscing elit.Ut ultrices leo eget <br />sem gravida ornare.</p>
            </li>
        </ul>
    </div>

    <!-- News and Tickers-->
    <div class="news-block">
        <div class="news">
            <h3>News &amp; Events</h3>
            <ul>
                  <?php if (isset($news) && $news != NULL): 
                    foreach($news as $event):
                      $date = explode('-', $event['dtDate']);
                        ?>
                <li>
                    <div class="dt"><span><?php echo $date[0];?></span><br /><?php echo $date[1];?></div>
                    <a href="<?php echo $event['vUrl']?>" target="_blank"><h4><?php echo $event['vTitle']?></h4><p><?php echo $event['vDescription']?> </p></a>
                </li>
                
                    <?php endforeach; endif;?>
            </ul>
        </div>
        <div class="highlts">
            <h3>Highlights</h3>
            <ul>
                <li><span>FREE</span> wide-screen TV</li>
                <li><span>50% Discount</span> for Restaraunt service</li>
                <li><span>30% Discount</span> for 3 days+ orders</li>
                <li><span>FREE drinks and beverages</span> in rooms Exclusive souvenirs</li>
            </ul>
        </div>
        <div class="testimonl">
            <h3>Testimonials</h3>
            <div>Lorem ipsum dolor sit amet, co nsectetur aipisc ing elit. Nulla iaculis aliquet augue, varius purus sollicitudin eget. Donec tellus sollicitudin eu congue tempor dapibus et metus. Fusce ac ipsum at magna accumsan  scelerisque sedon dolor.</div>
            <span class="name">Fred Brown</span>
        </div>
    </div>

    <!-- Gallery-->
    <div class="gallery">
        <ul id="carousel" class="elastislide-list">
            <?php if (isset($gallery) && $gallery != NULL): 
                    foreach($gallery as $image):?>
            <li><a href="#"><img src="<?php echo base_url();?>assets/upload/home_gallery/<?php echo $image['vImage']?>" alt="" /></a></li>
            <?php endforeach; endif;?>
        </ul>
    </div>

</div>

