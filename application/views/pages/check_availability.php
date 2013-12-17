</div>
<!-- Middle -->
<div id="middle">
    <div class="middle-main">
        <div class="middle-left">
            <div class="mid-reserv">
                <div class="reserv-details ">
                    <h2> <img src="http://localhost/myhotels/assets/images/reserv-icon.png"  alt="" /> Reservation</h2>
                </div>
                <form action="">
                    <div class="row1 row-top">
                        <select>
                            <option>Select Hotel</option>
                        </select>
                    </div>
                    <div class="row1">
                        <div class="row1-cont">
                            <input type="text" name="" value="Check in  "/>
                            <a href="#"><img src="http://localhost/myhotels/assets/images/calender1.png"  alt="" /></a> </div>
                        <div class="row1-cont">
                            <input type="text" name="" value="Check in  "/>
                            <a href="#"><img src="http://localhost/myhotels/assets/images/calender1.png"  alt="" /></a> </div>
                    </div>
                    <div class="row1">
                        <div class="row1-cont">
                            <input type="text" name="" value="Adults"/>
                        </div>
                        <div class="row1-cont">
                            <input type="text" name="" value="Children"/>
                        </div>
                    </div>
                    <div class="row1 ">
                        <select>
                            <option>Sort by star</option>
                        </select>
                    </div>
                    <div class="row1"> <a href="#" class="button-blue apply">Check Availability</a> </div>
                </form>
            </div>
            <div class="news-left">
                <div class=" news1">
                    <h3><img src="http://localhost/myhotels/assets/images/news-icon.png"  alt="" />News &amp; Events</h3>
                    <ul>
                        <?php
                        if (isset($news) && $news != NULL):
                            foreach ($news as $event):
                                $date = explode('-', $event['dtDate']);
                                ?>
                                <li>
                                    <div class="dt">
                                        <span><?php echo $date[0]; ?></span><br />
                                        <em><?php echo $date[1]; ?></em>
                                    </div>
                                    <div class="dt-cont">
                                        <h4><?php echo $event['vTitle'] ?></h4>
                                        <a href="<?php echo $event['vUrl'] ?>" target="_blank">
                                            <p><?php echo $event['vDescription'] ?></p>
                                        </a> 
                                    </div>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="middle-right">
            <div class="hotels">
                <?php if (isset($result) && $result != NULL): ?>
                    <div class="hotels-head"><span class="hotel-top-pager"><a href="#" title=""><img src="http://localhost/myhotels/assets/images/pager-lft-arrow.png"  alt="" /></a> <a href="#" title=""><img src="http://localhost/myhotels/assets/images/pager-rght-arrow.png"  alt="" /></a></span><?php echo count($result); ?> matching hotels found in  Ahmedabad</div>
                    <?php foreach ($result as $hotel): ?>
                        <div class="hotels-block relative">
                            <div class="hotels-block-img"><a href="#" title=""><img width="170" src="http://localhost/myhotels/assets/upload/hotel_main/<?php echo $hotel['vHotelMainImage']?>"  alt="" /></a></div>
                            <div class="hotels-block-desc">
                                <h3><?php echo $hotel['vHotelName'];?></h3>
                                <p><?php echo $hotel['vHotelAddress']; ?>&nbsp <a class="various fancybox.iframe" href="<?php echo $hotel['vMapUrl'];?>">View On Map</a></p>
                                <p class="color-black">Phone: <?php echo $hotel['vContactNumber'] ?>&nbsp   Fax: <?php echo $hotel['vContactNumber'] ?></p>
                                <div class="clear"></div>
                            </div>
                            <div class="hotels-block-but">
                                <a class="button-blue view-det submit-btn" href="http://localhost/myhotels/hotel/view?iHotelId=<?php echo $hotel['iHotelId'];?>">
                                    View Details
                                    <img class="brdr2" alt="" src="http://localhost/myhotels/assets/images/brdr-blue.png" height="20">
                                    <img class="arrow2" alt="" src="http://localhost/myhotels/assets/images/arrow-right.png">
                                </a>
                            </div>
                        </div>
                    <?php endforeach;
                endif;
                ?>
                    
                <div class="hotel-bttm-pager">
                    <a href="#" title=""><  Previous</a>
                    <a href="#" title="">1</a>
                    <a href="#" title="" class="active">2</a>
                    <a href="#" title="">3</a>
                    <a href="#" title="">4</a>
                    <a href="#" title="">6</a>
                    <a href="#" title="">Next  ></a>
                </div>
            </div>
        </div>
    </div>    
</div>
</div>
<div class="bottom">
    <div class="bottom-cont"> <a href="#"><img src="http://localhost/myhotels/assets/images/book-bg.png"  alt="" /><span>Booking Status</span></a>
        <input type="text" name="input" value="Enter Your Booking Number" />
        <a href="#" class="button-blue arrows2"><img src="http://localhost/myhotels/assets/images/arrows1.png"  alt="" /></a></div>
</div>
