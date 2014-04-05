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
                    <div class="step active-step1 ">
                        <div class="number">1</div>
                        Selected Rooms</div>
                    <div class="step active-step">
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
            <form id="signup" method="POST" action="<?php echo base_url(); ?>hotel/signup">
                <div class="middle-table">
                    <div class="middle-cont">
                        <div class="account1">
                            <div class="account-main">
                                <h3>Creating new account</h3>
                                <p>Items marked with an asterisk (<span>*</span>) are required </p>
                            </div>
                            <div class="account-right">
                                Already have an account?<a  class="loginlink" href="#login">Login here</a>
                            </div>
                            <div class="account-btm">
                                <img src="<?php echo base_url(); ?>assets/images/account-btm.png"  alt="" /> </div>
                        </div>

                    </div>
                    <div class="account-details">
                        <div class="details1">

                            <div class="details1-left">
                                <h3>Personal Details</h3>
                            </div>
                            <div class="details1-right">
                                <div class="detail-row">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" id="vFirstName" name="vFirstName" value=""/>
                                </div>
                                <div class="detail-row">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" id="vLastName" name="vLastName" value=""/>
                                </div>
                                <div class="detail-row">
                                    <label>Birth Date  </label>
                                    <input type="text" name="vDob"  id="vDob"/>
                                </div>
                            </div>
                        </div>
                        <div class="details1">
                            <div class="details1-left">
                                <h3>Billing Address</h3>
                            </div>
                            <div class="details1-right">
                                <div class="detail-row">
                                    <label>Address  <span>*</span></label>
                                    <input type="text" name="vAddress1" id="vAddress1" value=""/>
                                </div>
                                <div class="detail-row">
                                    <label>Address (line 2)</label>
                                    <input type="text" name="vAddress2" id="vAddress2" value=""/>
                                </div>
                                <div class="detail-row">
                                    <label>Country   <span>*</span></label>
                                    <select name="iCountryId" id="iCountryId"  onChange="getState(this.value)">
                                        <option value="" selected="" disabled="" />Select Country
                                        <?php if (isset($countries) && $countries != NULL) { ?>
                                            <?php foreach ($countries as $country) { ?>
                                                <option value=<?php echo $country['iCountryId'] ?>><?php echo $country['vCountryName'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="detail-row" id="statediv">
                                    <label>State/Province <span>*</span></label>
                                    <select  name='iStateId' id="iStateId" onChange="getCity(this.value)" >
                                        <option value="" >Select State</option>
                                    </select>
                                </div>
                                <div class="detail-row" id="citydiv">
                                    <label>City  <span>*</span> </label> 
                                    <select name='iCityId' id="iCityId">
                                        <option value="" >Select City</option>
                                    </select>
                                </div>
                                <div class="detail-row">
                                    <label>Zip/Postal code </label>
                                    <input type="text" name="iZip" id="iZip" maxlength="6" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="details1">
                            <div class="details1-left">
                                <h3>Contact Information</h3>
                            </div>
                            <div class="details1-right">
                                <div class="detail-row">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="vPhone" id="vPhone" maxlength="10" value=""/>
                                </div>
                                <div class="detail-row">
                                    <label>E-mail address <span>*</span></label> 
                                    <input type="text" name="vEmail" id="vEmail" value=""/></br>

                                </div>
                                <div id="vCheck_Email"></div>
                            </div>
                        </div>
                        <div class="details1">
                            <div class="details1-left">
                                <h3>Image verification</h3>
                            </div>
                            <div class="details1-right">
                                <div class="detail-row">
                                    <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha">
                                    <input type="hidden" name="confirm_captcha" id="confirm_captcha" value="<? echo $captcha['word']; ?>" >
                                </div>
                                <div class="detail-row">
                                    <p class="captcha_image"><? echo $captcha['image']; ?> </p>
                                    <div class="imag-captcha">
                                        <img id="refresh_captcha" src="<?php echo base_url(); ?>assets/images/refresh-icon.png"  alt="Refresh Captcha" /> 
                                        <img src="<?php echo base_url(); ?>assets/images/loud-icon.png"  alt="" /> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-details">
                            <div class="submit-left">
                                <p><input type="checkbox" name="" value=""/>Please send me information about specials and discounts!</p>
                                <p><input type="checkbox" name="" value=""/>I have read and AGREE with Terms & Conditions</p>
                            </div>
                            <div class="submit-right">
                                <a id="submit_form" class="button-blue book1 submit-btn" href="#">
                                    SUBMIT
                                    <img class="brdr1" alt="" src="<?php echo base_url(); ?>assets/images/brdr-blue.png">
                                    <img class="arrow1" alt="" src="<?php echo base_url(); ?>assets/images/arrow-right.png">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>

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

