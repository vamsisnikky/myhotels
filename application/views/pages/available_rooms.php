</div>
<!-- Middle -->
<div id="middle">
    <div class="middle-main">
        <div class="middle-left">
            <div class="mid-reserv">
                <div class="reserv-details ">
                    <h2> <img src="<?php echo base_url(); ?>assets/images/reserv-icon.png"  alt="" /> Reservation</h2>
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
                            <a href="#"><img src="<?php echo base_url(); ?>assets/images/calender1.png"  alt="" /></a> </div>
                        <div class="row1-cont">
                            <input type="text" name="" value="Check in  "/>
                            <a href="#"><img src="<?php echo base_url(); ?>assets/images/calender1.png"  alt="" /></a> </div>
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
                    <h3><img src="<?php echo base_url(); ?>assets/images/news-icon.png"  alt="" />News &amp; Events</h3>
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
            <div class="check-avail-head">Available Rooms</div>
            <?php if (isset($result) && $result != NULL && isset($details) && isset($hotel)): ?>
                <?php
                ?>
                <div class="check-avail-date-main"><span class="right"><strong>Found Total Rooms: </strong> <?php echo count($result) ?></span><span><strong>From:</strong> <?php echo $details['checkin_month'] . ' ' . $details['checkin_day'] . ', ' . $details['checkin_year']; ?> <strong>To:</strong> <?php echo $details['checkout_month'] . ' ' . $details['checkout_day'] . ', ' . $details['checkout_year'] . ' (' . $details['total_nights'] . ' Night)'; ?>  </span></div>

                <div class="avail-room-block">
                    <div class="check-avail-block">
                        <div class="check-avail-block-img"><a href="#" title=""><img src="<?php echo base_url(); ?>assets/upload/hotel_main/<?php echo $hotel[0]['vHotelMainImage']; ?>"  alt="<?php echo $hotel[0]['vHotelName']; ?>" /></a></div>
                        <div class="check-avail-block-desc pad-top-none">
                            <h3><?php echo $hotel[0]['vHotelName'] ?><img  width="70" height="15" src="<?php echo base_url(); ?>assets/images/stars-5.gif"  alt="" /></h3>
                            <h4><?php echo $hotel[0]['vHotelAddress'] ?>&nbsp <a class="various fancybox.iframe" href="<?php echo $hotel[0]['vMapUrl']; ?>">View On Map</a> </h4>
                            <p><?php echo $hotel[0]['vHotelDescription'] ?> </p>
                        </div>
                    </div>
                </div>
                <?php foreach ($result as $room): ?>
                    <div class="avail-room-block">
                        <div class="check-avail-block">
                            <div class="check-avail-block-desc pad-top-none">
                                <h3><?php echo $room['vRoomType'];
            if ($room['iAvailableCount'] > 5) {
                        ?> <span class="green">(available)</span><?php } else { ?> <span class="red">(<?php echo $room['iAvailableCount'] ?> Rooms Left)</span><?php } ?></h3>
                                <p><?php echo $room['iRoomDescription'] ?></p>
                                <div class="clear"></div>
                                <div class="avail-room-details">
                                    <span class="mar-rght-10">Max Adults: <?php echo $room['iMaxAdult'] ?></span> <span>Max Children: <?php echo $room['iMaxChild'] ?></span>
                                </div>
                                <div class="avail-room-details">
                                    <span class="mar-rght-20 left">Price: <strong> Rs <strike><span class="redprice"><? echo $room['fPrice']; ?> </span></strike></strong>
                                        <div class="save-price"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rs <span class="greenprice"><?php echo $room['fDiscountedPrice']; ?></span></strong>  <span>(You save 10%)</span> </div>
                                        <span class="avail-person-txt"><span class="redbg">*</span> Per Night</span> 
                                    </span>
                                    <span class="mar-rght-20 left">
                                        <table width="160" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="right">Meal Plans:
                                                    <select name="select" class="select-room">
                                                        <option>1 ($55.00)</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td align="right" class="avail-person-txt"><span class="redbg">*</span> Person/ Per Night</td>
                                            </tr>
                                        </table>
                                    </span>

                                </div>
                            </div>
                            <div class="avail-room-img"><a href="" title=""><img src="<?php echo base_url(); ?>assets/upload/room_image/<?php echo $room['vRoomImage'] ?>"  alt="" /></a>
                                <a class="book_button" href="<?php echo base_url() ?>hotel/book?iHotelRoomId=<?php echo $room['iHotelRoomId'] ?>" title=""><img src="<?php echo base_url(); ?>assets/images/book-but.png"  alt="" /></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

<?php endif; ?>
        </div>
    </div>

    <!-- News and Tickers--> 

    <!-- Gallery--> 

</div>
</div>
<div class="bottom">
    <div class="bottom-cont"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/book-bg.png"  alt="" /><span>Booking Status</span></a>
        <input type="text" name="input" value="Enter Your Booking Number" />
        <a href="#" class="button-blue arrows2"><img src="<?php echo base_url(); ?>assets/images/arrows1.png"  alt="" /></a></div>
</div>