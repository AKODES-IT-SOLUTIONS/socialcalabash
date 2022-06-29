@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Settings')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.admin-sidebar')

        <div class="settings main">
            <div class="main-content">
                <div class="contact-location">
                    <div class="contact-location-item">
                        <div class="contact-location-item-head">
                            <p>Contact information</p>
                        </div>
                        <div class="contact-location-item-form">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Name or company</label>
                                    <input type="text" class="form-control" name="name-company"
                                           placeholder="Steve Reynolds"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="example@gmail.com"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username"
                                           placeholder="f4edc5ae17d04bf1"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password"
                                           placeholder="*********"/>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control" name="c-password"
                                           placeholder="*********"/>
                                </div>
                                <div class="save-btn">
                                    <input type="submit" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="contact-location-item">
                        <div class="contact-location-item-head">
                            <p>Location information</p>
                        </div>
                        <div class="contact-location-item-form">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Time zone</label>
                                    <select id="country" name="country" class="form-control">
                                        <option value="Norway">Norway</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                            Republic of The
                                        </option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                            Islands
                                        </option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                        </option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                            People's Republic of
                                        </option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic
                                            Republic
                                        </option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                            Yugoslav Republic of
                                        </option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States
                                            of
                                        </option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                            Occupied
                                        </option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                            Grenadines
                                        </option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and
                                            The South Sandwich Islands
                                        </option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                        </option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor
                                            Outlying Islands
                                        </option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <select class="form-control">
                                        <option timeZoneId="1" gmtAdjustment="GMT-12:00" useDaylightTime="0"
                                                value="-12">(GMT-12:00) International Date Line West
                                        </option>
                                        <option timeZoneId="2" gmtAdjustment="GMT-11:00" useDaylightTime="0"
                                                value="-11">(GMT-11:00) Midway Island, Samoa
                                        </option>
                                        <option timeZoneId="3" gmtAdjustment="GMT-10:00" useDaylightTime="0"
                                                value="-10">(GMT-10:00) Hawaii
                                        </option>
                                        <option timeZoneId="4" gmtAdjustment="GMT-09:00" useDaylightTime="1" value="-9">
                                            (GMT-09:00) Alaska
                                        </option>
                                        <option timeZoneId="5" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">
                                            (GMT-08:00) Pacific Time (US & Canada)
                                        </option>
                                        <option timeZoneId="6" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">
                                            (GMT-08:00) Tijuana, Baja California
                                        </option>
                                        <option timeZoneId="7" gmtAdjustment="GMT-07:00" useDaylightTime="0" value="-7">
                                            (GMT-07:00) Arizona
                                        </option>
                                        <option timeZoneId="8" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">
                                            (GMT-07:00) Chihuahua, La Paz, Mazatlan
                                        </option>
                                        <option timeZoneId="9" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">
                                            (GMT-07:00) Mountain Time (US & Canada)
                                        </option>
                                        <option timeZoneId="10" gmtAdjustment="GMT-06:00" useDaylightTime="0"
                                                value="-6">(GMT-06:00) Central America
                                        </option>
                                        <option timeZoneId="11" gmtAdjustment="GMT-06:00" useDaylightTime="1"
                                                value="-6">(GMT-06:00) Central Time (US & Canada)
                                        </option>
                                        <option timeZoneId="12" gmtAdjustment="GMT-06:00" useDaylightTime="1"
                                                value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey
                                        </option>
                                        <option timeZoneId="13" gmtAdjustment="GMT-06:00" useDaylightTime="0"
                                                value="-6">(GMT-06:00) Saskatchewan
                                        </option>
                                        <option timeZoneId="14" gmtAdjustment="GMT-05:00" useDaylightTime="0"
                                                value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco
                                        </option>
                                        <option timeZoneId="15" gmtAdjustment="GMT-05:00" useDaylightTime="1"
                                                value="-5">(GMT-05:00) Eastern Time (US & Canada)
                                        </option>
                                        <option timeZoneId="16" gmtAdjustment="GMT-05:00" useDaylightTime="1"
                                                value="-5">(GMT-05:00) Indiana (East)
                                        </option>
                                        <option timeZoneId="17" gmtAdjustment="GMT-04:00" useDaylightTime="1"
                                                value="-4">(GMT-04:00) Atlantic Time (Canada)
                                        </option>
                                        <option timeZoneId="18" gmtAdjustment="GMT-04:00" useDaylightTime="0"
                                                value="-4">(GMT-04:00) Caracas, La Paz
                                        </option>
                                        <option timeZoneId="19" gmtAdjustment="GMT-04:00" useDaylightTime="0"
                                                value="-4">(GMT-04:00) Manaus
                                        </option>
                                        <option timeZoneId="20" gmtAdjustment="GMT-04:00" useDaylightTime="1"
                                                value="-4">(GMT-04:00) Santiago
                                        </option>
                                        <option timeZoneId="21" gmtAdjustment="GMT-03:30" useDaylightTime="1"
                                                value="-3.5">(GMT-03:30) Newfoundland
                                        </option>
                                        <option timeZoneId="22" gmtAdjustment="GMT-03:00" useDaylightTime="1"
                                                value="-3">(GMT-03:00) Brasilia
                                        </option>
                                        <option timeZoneId="23" gmtAdjustment="GMT-03:00" useDaylightTime="0"
                                                value="-3">(GMT-03:00) Buenos Aires, Georgetown
                                        </option>
                                        <option timeZoneId="24" gmtAdjustment="GMT-03:00" useDaylightTime="1"
                                                value="-3">(GMT-03:00) Greenland
                                        </option>
                                        <option timeZoneId="25" gmtAdjustment="GMT-03:00" useDaylightTime="1"
                                                value="-3">(GMT-03:00) Montevideo
                                        </option>
                                        <option timeZoneId="26" gmtAdjustment="GMT-02:00" useDaylightTime="1"
                                                value="-2">(GMT-02:00) Mid-Atlantic
                                        </option>
                                        <option timeZoneId="27" gmtAdjustment="GMT-01:00" useDaylightTime="0"
                                                value="-1">(GMT-01:00) Cape Verde Is.
                                        </option>
                                        <option timeZoneId="28" gmtAdjustment="GMT-01:00" useDaylightTime="1"
                                                value="-1">(GMT-01:00) Azores
                                        </option>
                                        <option timeZoneId="29" gmtAdjustment="GMT+00:00" useDaylightTime="0" value="0">
                                            (GMT+00:00) Casablanca, Monrovia, Reykjavik
                                        </option>
                                        <option timeZoneId="30" gmtAdjustment="GMT+00:00" useDaylightTime="1" value="0">
                                            (GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London
                                        </option>
                                        <option timeZoneId="31" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">
                                            (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                                        </option>
                                        <option timeZoneId="32" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">
                                            (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague
                                        </option>
                                        <option timeZoneId="33" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">
                                            (GMT+01:00) Brussels, Copenhagen, Madrid, Paris
                                        </option>
                                        <option timeZoneId="34" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">
                                            (GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb
                                        </option>
                                        <option timeZoneId="35" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">
                                            (GMT+01:00) West Central Africa
                                        </option>
                                        <option timeZoneId="36" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Amman
                                        </option>
                                        <option timeZoneId="37" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Athens, Bucharest, Istanbul
                                        </option>
                                        <option timeZoneId="38" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Beirut
                                        </option>
                                        <option timeZoneId="39" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Cairo
                                        </option>
                                        <option timeZoneId="40" gmtAdjustment="GMT+02:00" useDaylightTime="0" value="2">
                                            (GMT+02:00) Harare, Pretoria
                                        </option>
                                        <option timeZoneId="41" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius
                                        </option>
                                        <option timeZoneId="42" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Jerusalem
                                        </option>
                                        <option timeZoneId="43" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Minsk
                                        </option>
                                        <option timeZoneId="44" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">
                                            (GMT+02:00) Windhoek
                                        </option>
                                        <option timeZoneId="45" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">
                                            (GMT+03:00) Kuwait, Riyadh, Baghdad
                                        </option>
                                        <option timeZoneId="46" gmtAdjustment="GMT+03:00" useDaylightTime="1" value="3">
                                            (GMT+03:00) Moscow, St. Petersburg, Volgograd
                                        </option>
                                        <option timeZoneId="47" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">
                                            (GMT+03:00) Nairobi
                                        </option>
                                        <option timeZoneId="48" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">
                                            (GMT+03:00) Tbilisi
                                        </option>
                                        <option timeZoneId="49" gmtAdjustment="GMT+03:30" useDaylightTime="1"
                                                value="3.5">(GMT+03:30) Tehran
                                        </option>
                                        <option timeZoneId="50" gmtAdjustment="GMT+04:00" useDaylightTime="0" value="4">
                                            (GMT+04:00) Abu Dhabi, Muscat
                                        </option>
                                        <option timeZoneId="51" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">
                                            (GMT+04:00) Baku
                                        </option>
                                        <option timeZoneId="52" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">
                                            (GMT+04:00) Yerevan
                                        </option>
                                        <option timeZoneId="53" gmtAdjustment="GMT+04:30" useDaylightTime="0"
                                                value="4.5">(GMT+04:30) Kabul
                                        </option>
                                        <option timeZoneId="54" gmtAdjustment="GMT+05:00" useDaylightTime="1" value="5">
                                            (GMT+05:00) Yekaterinburg
                                        </option>
                                        <option timeZoneId="55" gmtAdjustment="GMT+05:00" useDaylightTime="0" value="5">
                                            (GMT+05:00) Islamabad, Karachi, Tashkent
                                        </option>
                                        <option timeZoneId="56" gmtAdjustment="GMT+05:30" useDaylightTime="0"
                                                value="5.5">(GMT+05:30) Sri Jayawardenapura
                                        </option>
                                        <option timeZoneId="57" gmtAdjustment="GMT+05:30" useDaylightTime="0"
                                                value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
                                        </option>
                                        <option timeZoneId="58" gmtAdjustment="GMT+05:45" useDaylightTime="0"
                                                value="5.75">(GMT+05:45) Kathmandu
                                        </option>
                                        <option timeZoneId="59" gmtAdjustment="GMT+06:00" useDaylightTime="1" value="6">
                                            (GMT+06:00) Almaty, Novosibirsk
                                        </option>
                                        <option timeZoneId="60" gmtAdjustment="GMT+06:00" useDaylightTime="0" value="6">
                                            (GMT+06:00) Astana, Dhaka
                                        </option>
                                        <option timeZoneId="61" gmtAdjustment="GMT+06:30" useDaylightTime="0"
                                                value="6.5">(GMT+06:30) Yangon (Rangoon)
                                        </option>
                                        <option timeZoneId="62" gmtAdjustment="GMT+07:00" useDaylightTime="0" value="7">
                                            (GMT+07:00) Bangkok, Hanoi, Jakarta
                                        </option>
                                        <option timeZoneId="63" gmtAdjustment="GMT+07:00" useDaylightTime="1" value="7">
                                            (GMT+07:00) Krasnoyarsk
                                        </option>
                                        <option timeZoneId="64" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">
                                            (GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi
                                        </option>
                                        <option timeZoneId="65" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">
                                            (GMT+08:00) Kuala Lumpur, Singapore
                                        </option>
                                        <option timeZoneId="66" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">
                                            (GMT+08:00) Irkutsk, Ulaan Bataar
                                        </option>
                                        <option timeZoneId="67" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">
                                            (GMT+08:00) Perth
                                        </option>
                                        <option timeZoneId="68" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">
                                            (GMT+08:00) Taipei
                                        </option>
                                        <option timeZoneId="69" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">
                                            (GMT+09:00) Osaka, Sapporo, Tokyo
                                        </option>
                                        <option timeZoneId="70" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">
                                            (GMT+09:00) Seoul
                                        </option>
                                        <option timeZoneId="71" gmtAdjustment="GMT+09:00" useDaylightTime="1" value="9">
                                            (GMT+09:00) Yakutsk
                                        </option>
                                        <option timeZoneId="72" gmtAdjustment="GMT+09:30" useDaylightTime="0"
                                                value="9.5">(GMT+09:30) Adelaide
                                        </option>
                                        <option timeZoneId="73" gmtAdjustment="GMT+09:30" useDaylightTime="0"
                                                value="9.5">(GMT+09:30) Darwin
                                        </option>
                                        <option timeZoneId="74" gmtAdjustment="GMT+10:00" useDaylightTime="0"
                                                value="10">(GMT+10:00) Brisbane
                                        </option>
                                        <option timeZoneId="75" gmtAdjustment="GMT+10:00" useDaylightTime="1"
                                                value="10">(GMT+10:00) Canberra, Melbourne, Sydney
                                        </option>
                                        <option timeZoneId="76" gmtAdjustment="GMT+10:00" useDaylightTime="1"
                                                value="10">(GMT+10:00) Hobart
                                        </option>
                                        <option timeZoneId="77" gmtAdjustment="GMT+10:00" useDaylightTime="0"
                                                value="10">(GMT+10:00) Guam, Port Moresby
                                        </option>
                                        <option timeZoneId="78" gmtAdjustment="GMT+10:00" useDaylightTime="1"
                                                value="10">(GMT+10:00) Vladivostok
                                        </option>
                                        <option timeZoneId="79" gmtAdjustment="GMT+11:00" useDaylightTime="1"
                                                value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia
                                        </option>
                                        <option timeZoneId="80" gmtAdjustment="GMT+12:00" useDaylightTime="1"
                                                value="12">(GMT+12:00) Auckland, Wellington
                                        </option>
                                        <option timeZoneId="81" gmtAdjustment="GMT+12:00" useDaylightTime="0"
                                                value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.
                                        </option>
                                        <option timeZoneId="82" gmtAdjustment="GMT+13:00" useDaylightTime="0"
                                                value="13">(GMT+13:00) Nuku'alofa
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Language</label>
                                    <select class="form-control">
                                        <option value="EUS">English-US</option>
                                        <option value="SQ">Albanian</option>
                                        <option value="AR">Arabic</option>
                                        <option value="HY">Armenian</option>
                                        <option value="EU">Basque</option>
                                        <option value="BN">Bengali</option>
                                        <option value="BG">Bulgarian</option>
                                        <option value="CA">Catalan</option>
                                        <option value="KM">Cambodian</option>
                                        <option value="ZH">Chinese (Mandarin)</option>
                                        <option value="HR">Croatian</option>
                                        <option value="CS">Czech</option>
                                        <option value="DA">Danish</option>
                                        <option value="NL">Dutch</option>
                                        <option value="EN">English</option>
                                        <option value="ET">Estonian</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finnish</option>
                                        <option value="FR">French</option>
                                        <option value="KA">Georgian</option>
                                        <option value="DE">German</option>
                                        <option value="EL">Greek</option>
                                        <option value="GU">Gujarati</option>
                                        <option value="HE">Hebrew</option>
                                        <option value="HI">Hindi</option>
                                        <option value="HU">Hungarian</option>
                                        <option value="IS">Icelandic</option>
                                        <option value="ID">Indonesian</option>
                                        <option value="GA">Irish</option>
                                        <option value="IT">Italian</option>
                                        <option value="JA">Japanese</option>
                                        <option value="JW">Javanese</option>
                                        <option value="KO">Korean</option>
                                        <option value="LA">Latin</option>
                                        <option value="LV">Latvian</option>
                                        <option value="LT">Lithuanian</option>
                                        <option value="MK">Macedonian</option>
                                        <option value="MS">Malay</option>
                                        <option value="ML">Malayalam</option>
                                        <option value="MT">Maltese</option>
                                        <option value="MI">Maori</option>
                                        <option value="MR">Marathi</option>
                                        <option value="MN">Mongolian</option>
                                        <option value="NE">Nepali</option>
                                        <option value="NO">Norwegian</option>
                                        <option value="FA">Persian</option>
                                        <option value="PL">Polish</option>
                                        <option value="PT">Portuguese</option>
                                        <option value="PA">Punjabi</option>
                                        <option value="QU">Quechua</option>
                                        <option value="RO">Romanian</option>
                                        <option value="RU">Russian</option>
                                        <option value="SM">Samoan</option>
                                        <option value="SR">Serbian</option>
                                        <option value="SK">Slovak</option>
                                        <option value="SL">Slovenian</option>
                                        <option value="ES">Spanish</option>
                                        <option value="SW">Swahili</option>
                                        <option value="SV">Swedish</option>
                                        <option value="TA">Tamil</option>
                                        <option value="TT">Tatar</option>
                                        <option value="TE">Telugu</option>
                                        <option value="TH">Thai</option>
                                        <option value="BO">Tibetan</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TR">Turkish</option>
                                        <option value="UK">Ukrainian</option>
                                        <option value="UR">Urdu</option>
                                        <option value="UZ">Uzbek</option>
                                        <option value="VI">Vietnamese</option>
                                        <option value="CY">Welsh</option>
                                        <option value="XH">Xhosa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Clock Format</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">12 - hour</option>
                                        <option value="">24 - hour</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar and main-content section ends -->

    <!-- Compose Modal Modal -->
    <div id="composeModal" class="composeModal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="composeClose">&times;</span>
            <div class="modal-content-head">
                <p>New Message/Post</p>
            </div>
            <div class="tags">
                <ul>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>

                    <li><img src="{{ asset('dashboard/img/insta-icon.png') }}"> demoigchannel<span class="tag-close">&times;</span></li>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>
                    <li><img src="{{ asset('dashboard/img/fb-icon.png') }}">demofbchannel<span class="tag-close">&times;</span></li>
                </ul>
            </div>
            <div class="message">
                <form action="">
                    <textarea id="" rows="5" placeholder="Type your message here..."></textarea>
                    <label class="filelabel">
                        <i class="fa fa-paperclip">
                        </i>

                        <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file"/>
                    </label>
                    <img src="{{ asset('dashboard/img/emoji-smile.png') }}" alt="">
                </form>
            </div>
            <div class="links-postas">
                <div class="links">
                    <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('dashboard/img/query-queue.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('dashboard/img/globe.png') }}" alt=""></a>
                </div>
                <div class="postas">
                    <form action="">
                        <label for="">Post to Facebook as</label>
                        <select name="" id="">
                            <option value="">Published</option>
                            <option value="">Save</option>
                            <option value="">Private</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="footer">
                <a href="#">cancel</a>
                <a href="#">save</a>
                <a href="#">send for approval</a>
                <a href="#">send now</a>
            </div>
        </div>
    </div>
@endsection
