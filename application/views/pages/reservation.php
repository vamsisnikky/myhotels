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
                    <div class="step active-step1">
                        <div class="number">1</div>
                        Selected Rooms</div>
                    <div class="step active-step1">
                        <div class="number">2</div>
                        Booking Details </div>
                    <div class="step active-step">
                        <div class="number">3</div>
                        Reservation </div>
                    <div class="step last">
                        <div class="number">4</div>
                        Payment </div>
                </div>
            </div>
            <?php if (isset($book_details) && isset($customer) && isset($date_details)): ?>
                <div class="middle-table">


                    <div class="middle-cont">
                        <div class="account1">
                            <div class="account-main main1">
                                <h3>Billing Details</h3>
                                <p><strong class="first">First Name: </strong><?php echo $customer['vFirstName']; ?>    <strong> Last Name:</strong> <?php echo $customer['vLastName']; ?></p>
                                <p><strong class="first">Address:</strong><?php echo $customer['vAddress1'] . ' ' . $customer['vAddress2'] ?> </p>
                                <p><strong class="first">City: </strong><?php echo $customer['vCityName']; ?> <strong> State:</strong> <?php echo $customer['vStateName']; ?> <strong> Country:</strong> <?php echo $customer['vCountryName']; ?> <strong> Zip/Postal code:</strong> <?php echo $customer['iZip']; ?>      </p>
                            </div>
                            <input id="customer_id" name="customer_id" type="hidden" value="<?php echo $customer['iCustomerId']; ?> ">
                            <input id="email" name="email" type="hidden" value="<?php echo $customer['vEmail']; ?> ">
                            <input id="fname" name="fname" type="hidden" value="<?php echo $customer['vFirstName']; ?> ">
                            <input id="lname" name="lname" type="hidden" value="<?php echo $customer['vLastName']; ?> ">


                            <div class="account-btm"> <img src="<?php echo base_url(); ?>assets/images/account-btm.png"  alt="" /> </div>

                        </div>
                    </div>
                    <div class="main-tab">
                        <table width="100%" cellpadding="0" cellspacing="0" class="tab1  ">
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
                            <tr class="odd">
                                <td valign="middle" align="center"><img src="<?php echo base_url(); ?>assets/images/delete-icon.png"  alt="" /></td>
                                <td valign="middle" align="center"><?php echo $book_details['vRoomType'] ?><br/>
                                    <span class="greenbg"><?php echo $book_details['vHotelName'] ?></span></td>
                                <td valign="middle" align="center"><?php echo ' ' . $date_details['checkin_day'] . ' ' . $date_details['checkin_month'] ?> <br/>
                                    <?php echo $date_details['checkin_year'] ?></td>
                                <td valign="middle" align="center"><?php echo ' ' . $date_details['checkout_day'] . ' ' . $date_details['checkout_month'] ?> <br/>
                                    <?php echo $date_details['checkout_year'] ?></td>
                                <td valign="middle" align="center"> Rs <?php echo $book_details['room_price'] ?></td>
                                <td valign="middle" align="center"><?php echo $date_details['total_nights']; ?></td>
                                <td valign="middle" align="center">1</td>
                                <td valign="middle" align="center"><span class="minwid"> <?php echo $book_details['iAdult']; ?></span> <span class="minwid"> <?php echo $book_details['iChild']; ?></span><span class="minwid"> 0</span></td>
                                <td valign="middle" align="center">Rs <?php echo $book_details['iTotalPrice'] ?></td>
                            </tr>
                        </table>
                        <table width="235px" cellpadding="0" cellspacing="0" class="tab2">
                            <tr>
                                <td colspan="3"  height="18">&nbsp;</td>
                            </tr>
                            <tr class="rows1">
                                <td width="34px" height="30">&nbsp;</td>
                                <td width="110px">Subtotal: </td>
                                <td width="79px"> Rs <?php echo $book_details['iTotalPrice'] ?> </td>
                            </tr>
                            <tr class="rows2">
                                <td height="24">&nbsp;</td>
                                <td>VAT: (0.00%)</td>
                                <td> $0.00 </td>
                            </tr>
                            <tr class="total1">
                                <td>&nbsp;</td>
                                <td>TOTAL </td>
                                <td> Rs <?php echo $book_details['iTotalPrice'] ?> </td>
                            </tr>
                        </table>
                        <div class="tab2-left">
                            <div class="tab2-main">
                                <div class="tab2-detail">
                                    <h3>Extras</h3>
                                </div>
                            </div>

                        </div>

                        <div class="book-btn"><a href="#" class="button-blue apply">Submit Booking</a><img src="<?php echo base_url(); ?>assets/images/brdr-blue.png"  alt="" class="brdr1" /> <img src="<?php echo base_url(); ?>assets/images/arrow-right.png"  alt="" class="arrow1" /> </a> </div>
                    </div>  
                </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        cust_name = $('#fname').val() + $('#lname').val();
        emailid = $('#email').val();
        customer_id = $('#customer_id').val();
        $.ajax({
            url: 'sendmail',
            type: 'POST',
            data: {email: emailid, name: cust_name,cust_id :customer_id},
            success: function(data) {
            }
        });

    });
</script>