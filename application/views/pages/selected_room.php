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
            <div class="middle-nav">
                <div class="step-big-cnt">
                    <div class="step active-step">
                        <div class="number">1</div>
                        Selected Rooms</div>
                    <div class="step">
                        <div class="number">2</div>
                        Booking Details </div>
                    <div class="step">
                        <div class="number">3</div>
                        Reservation </div>
                    <div class="step last">
                        <div class="number">4</div>
                        Payment </div>
                </div>
            </div>
            <div class="middle-table">
                <table width="100%" cellpadding="0" cellspacing="0" class="tab1">
                    <tr>
                        <th valign="middle" align="center" width="38px">&nbsp;</th>
                        <th valign="middle" align="center" width="90px">Room Type</th>
                        <th valign="middle" align="center" width="58px">From</th>
                        <th valign="middle" align="center" width="51px">To</th>
                        <th valign="middle" align="center" width="90px">Price Per Night </th>
                        <th valign="middle" align="center" width="63px"> Nights</th>
                        <th valign="middle" align="center" width="80px">Rooms</th>
                        <th valign="middle" align="center" width="147px">Occupancy </th>
                        <th valign="middle" align="center" width="87px">Price</th>
                    </tr>
                    <tr class="sub-tab">
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"></td>
                        <td valign="middle" align="center"><span class="minwid">Adult</span> <span class="minwid"> Child </span> <span class="minwid">Guest</span></td>
                        <td valign="middle" align="center"></td>
                    </tr>
                    <?php if (isset($result) && $result != NULL && isset($hotel) && $hotel != NULL && isset($details)) : ?>
                        <?php foreach ($result as $room) : ?>
                            <tr class="odd">
                                <td valign="middle" align="center"><img src="<?php echo base_url(); ?>assets/images/delete-icon.png"  alt="" /></td>
                                <td valign="middle" align="center"><?php echo $room['vRoomType']; ?><br/>
                                    <span class="greenbg"><?php echo $hotel[0]['vHotelName'] ?></span></td>
                                <td valign="middle" align="center"><?php echo ' ' . $details['checkin_day'] . ' ' . $details['checkin_month'] ?> <br/>
                                    <?php echo $details['checkin_year'] ?> </td>
                                <td valign="middle" align="center"><?php echo ' ' . $details['checkout_day'] . ' ' . $details['checkout_month'] ?> <br/>
                                    <?php echo $details['checkout_year'] ?> </td>
                                <td valign="middle" align="center">Rs <?php echo $room['fDiscountedPrice'] ?></td>
                                <td valign="middle" align="center"><?php echo $details['total_nights']; ?></td>
                                <td valign="middle" align="center"><?php echo count($result) ?> </td>
                                <td valign="middle" align="center"><span class="minwid"> <?php echo $details['total_adult'] ?></span> <span class="minwid"><?php echo $details['total_child'] ?></span><span class="minwid"> 0</span></td>
                                
                                <?php $details['total_price'] = $details['total_nights'] * $room['fDiscountedPrice'] ?>
                                <td valign="middle" align="center">Rs <?php echo ' ' . $details['total_price'] ?></td>
                            </tr>
                            <?php
                            $this->session->set_userdata('iTotalPrice', $details['total_price']);
                            $this->session->set_userdata('vHotelName', $hotel[0]['vHotelName']);
                            $this->session->set_userdata('vRoomType', $room['vRoomType']);
                            $this->session->set_userdata('iHotelRoomId', $room['iHotelRoomId']);
                        endforeach;
                    endif;
                    ?>
                </table>
                <table width="235px" cellpadding="0" cellspacing="0" class="tab2">
                    <tr>
                        <td colspan="3"  height="18">&nbsp;</td>
                    </tr>
                    <tr class="rows1">
                        <td width="34px" height="30">&nbsp;</td>
                        <td width="110px">Subtotal: </td>
                        <td width="79px"> Rs <?php echo ' ' . $details['total_price'] ?></td>
                    </tr>
                    <tr class="rows2">
                        <td height="24">&nbsp;</td>
                        <td>VAT: (0.00%)</td>
                        <td> $0.00 </td>
                    </tr>
                    <tr class="total1">
                        <td>&nbsp;</td>
                        <td>TOTAL </td>
                        <td> Rs <?php echo ' ' . $details['total_price'] ?> </td>
                    </tr>
                </table>
                <?php $this->session->set_userdata('vHotelName', $hotel[0]['vHotelName']) ?>
<?php $this->session->set_userdata('vRoomType', $room['vRoomType']) ?>
<?php $this->session->set_userdata('iHotelRoomId', $room['iHotelRoomId']) ?>
            </div>
            <div class="book-btn">
                <a href="<?php echo base_url(); ?>hotel/booking_details" class="button-blue book1">Book Now
                    <img src="<?php echo base_url(); ?>assets/images/brdr-blue.png"  alt="" class="brdr1" />
                    <img src="<?php echo base_url(); ?>assets/images/arrow-right.png"  alt="" class="arrow1" /> </a>
            </div>

        </div>
    </div>

    <!-- News and Tickers--> 

    <!-- Gallery--> 

</div>
</div>
<div class="bottom">
    <div class="bottom-cont">
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/book-bg.png"  alt="" /><span>Booking Status</span></a>
        <input type="text" name="" value="Enter Your Booking Number" />   <a href="#" class="button-blue arrows2"><img src="<?php echo base_url(); ?>assets/images/arrows1.png"  alt="" /></a></div>
</div>