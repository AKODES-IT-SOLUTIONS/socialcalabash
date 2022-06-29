@extends('dashboard.layouts.app')

@section('title', 'Channels - Dashboard')

@section('body')
    <!-- sidebar and main-content section starts -->
    <div class="sidebar-main-content">

        @include('dashboard.sidebars.channels-sidebar')

        <div class="channels main">
            <div class="main-header">
                <div class="main-header-btns">
                    <form action="">
                        <input type="checkbox" name="check">
                    </form>
                    <a href="#"><img src="{{ asset('dashboard/img/delete.png') }}" alt="Delete Icon" /></a>
                    <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt="Calender Icon"></a>
                    <form action="">
                        <label for=""><input type="checkbox" name="Download">Download Only</label>
                    </form>
                </div>
                <div class="csv-search-filter">
                    <ul>
                        <li>
                            <button id="myBtn"><i class="fa fa-plus"></i>&nbsp;Add New</button>
                        </li>
                        <li><a href="#">Filter by organization</a></li>
                        <li>
                            <form action="">
                                <input type="text" placeholder="Search" />
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div style="overflow: auto;">
                    <table class="">
                        <tbody id="page_list">

                            @if (session()->has('accessTokenError'))
                                <tr>
                                    <td colspan="3" style="text-align: center;color: red;">
                                        {{ session()->get('accessTokenError') }}
                                    </td>
                                </tr>
                                <script>
                                document.addEventListener("DOMContentLoaded", (event) => {
                                    toastr.error("{{ session()->get('accessTokenError') }}")
                                });
                                </script>
                            @endif

                            @foreach ($errors->all() as $error)
                                <tr>
                                    <td colspan="3" style="text-align: center;color: green;">
                                        {{ $error }}
                                    </td>
                                </tr>
                            @endforeach


                            @if (empty($channels))
                                <tr>
                                    <td style="text-align:center;"> No Social Account is Connected Login To Link Accounts
                                    </td>
                                </tr>
                            @else
                                @foreach ($channels as $key => $channel)
                                    <tr style="border-bottom: 1px solid #707070;">
                                        <td style="border: none">
                                            <form action="">
                                                <input type="checkbox" data-index="{{ $key }}"
                                                    data-secert="{{ $channel['secret'] }}"
                                                    id="selectedPage{{ $key }}"
                                                    data-page_id="{{ $channel['page_id'] }}"
                                                    data-access_token="{{ $channel['access_token'] }}"
                                                    data-account="{{ $channel['channel_type'] }}"
                                                    data-page_name="{{ $channel['page_name'] }}"
                                                    onclick="selectedPages(this)" />
                                            </form>
                                        </td>
                                        <td class="image-text" style="border: none">
                                            <div class="image" style="position: relative">
                                                @php
                                                    $imageName = null;
                                                    $account_name = null;
                                                    if ($channel['channel_type'] === 'fb_page') {
                                                        $imageName = 'facebook-rect.png';
                                                        $account_name = 'Facebook page';
                                                    }
                                                    
                                                    if ($channel['channel_type'] === 'fb_group') {
                                                        $imageName = 'facebook-rect.png';
                                                        $account_name = 'Facebook group';
                                                    }
                                                    
                                                    if ($channel['channel_type'] === 'instagram') {
                                                        $imageName = 'bxl-instagram-alt.png';
                                                        $account_name = 'Instagram account';
                                                    }
                                                    
                                                    if ($channel['channel_type'] === 'linkedin') {
                                                        $imageName = 'linkedin-square.png';
                                                        $account_name = 'Linkedin account';
                                                    }

                                                    if ($channel['channel_type'] === 'reddit') {
                                                        $imageName = 'reddit.png';
                                                        $account_name = 'Reddit account';
                                                    }
                                                    
                                                    if ($channel['channel_type'] === 'twitter') {
                                                        $imageName = 'twitter-box.png';
                                                        $account_name = 'Twitter account';
                                                    }
                                                    if ($channel['channel_type'] === 'pinterest') {
                                                        $imageName = 'pinterest.png';
                                                        $account_name = 'Pinterest account';
                                                    }
                                                    
                                                @endphp
                                                <img src="{{ asset('dashboard/img/' . $imageName) }}" alt="Fb Icon" />
                                                <img style="position: absolute;
                                                                                                                                                                                                                                                                                                                                                                                                                            width: 18px;
                                                                                                                                                                                                                                                                                                                                                                                                                            right: -3px;
                                                                                                                                                                                                                                                                                                                                                                                                                            bottom: -1px;
                                                                                                                                                                                                                                                                                                                                                                                                                            border-radius: 10px;"
                                                    src="{{ $channel['image'] }}" />
                                            </div>
                                            <div class="text">
                                                <div class="heading">
                                                    <p>{{ $channel['page_name'] }}</p>
                                                </div>
                                                <div class="page-name">
                                                    <p>{{ $account_name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right" style="border: none">
                                        <div style="display: flex">
                                              <a href="#"><img src="{{ asset('dashboard/img/edit-icon.png') }}"
                                                      alt="Edit Icon"></a>
                                              <a href="#"><img src="{{ asset('dashboard/img/delete-icon.png') }}"
                                                      alt="Delete Icon"></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            {{-- End --}}
                            {{-- <tr>
                         <td>
                           <form action="">
                             <input type="checkbox" />
                           </form>
                         </td>
                         <td class="image-text">
                           <div class="image">
                             <img src="img/facebook-rect.png" alt="Fb Icon" />
                           </div>
                           <div class="text">
                             <div class="heading"><p>Demofbchannel</p></div>
                             <div class="page-name"><p>Facebook Page</p></div>
                           </div>
                         </td>
                         <td class="text-right">
                           <a href="#"><img src="img/edit-icon.png" alt="Edit Icon"></a>
                           <a href="#"><img src="img/delete-icon.png" alt="Delete Icon"></a>
                         </td>
                       </tr>
                       <tr>
                         <td>
                           <form action="">
                             <input type="checkbox" />
                           </form>
                         </td>
                         <td class="image-text">
                           <div class="image">
                             <img src="img/bxl-instagram-alt.png" alt="Insta Icon" />
                           </div>
                           <div class="text">
                             <div class="heading"><p>Demoigbchannel</p></div>
                             <div class="page-name"><p>Facebook Page</p></div>
                           </div>
                         </td>
                         <td class="text-right">
                           <a href="#"><img src="img/edit-icon.png" alt="Edit Icon"></a>
                           <a href="#"><img src="img/delete-icon.png" alt="Delete Icon"></a>
                         </td>
                       </tr>
                       <tr>
                         <td>
                           <form action="">
                             <input type="checkbox" />
                           </form>
                         </td>
                         <td class="image-text">
                           <div class="image">
                             <img src="img/twitter-box.png" alt="Twitter Icon" />
                           </div>
                           <div class="text">
                             <div class="heading"><p>Demofbchannel</p></div>
                             <div class="page-name"><p>Facebook Page</p></div>
                           </div>
                         </td>
                         <td class="text-right">
                           <a href="#"><img src="img/edit-icon.png" alt="Edit Icon"></a>
                           <a href="#"><img src="img/delete-icon.png" alt="Delete Icon"></a>
                         </td>
                       </tr>
                       <tr>
                         <td>
                           <form action="">
                             <input type="checkbox" />
                           </form>
                         </td>
                         <td class="image-text">
                           <div class="image">
                             <img src="img/linkedin-square.png" alt="LinkedIn Icon" />
                           </div>
                           <div class="text">
                             <div class="heading"><p>Demofbchannel</p></div>
                             <div class="page-name"><p>Facebook Page</p></div>
                           </div>
                         </td>
                         <td class="text-right">
                           <a href="#"><img src="img/edit-icon.png" alt="Edit Icon"></a>
                           <a href="#"><img src="img/delete-icon.png" alt="Delete Icon"></a>
                         </td>
                       </tr> --}}
                            {{-- End --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar and main-content section ends -->

    <!-- Add New Channel -->
    <div id="addNewModal" class="addNewModal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="addNewClose">&times;</span>
            <div class="modal-content-head">
                <p>Please Select a Channel To Link</p>
            </div>
            <div class="modal-content-desc">
                <p>You can connect upto 24 channels</p>
                <p>in your free trial</p>
            </div>
            <div class="modal-content-channels">
                <a href="{{ route('facebook.login') }}"><img src="{{ asset('dashboard/img/facebook-rect.png') }}"
                        alt="Fb Icon"></a>
                <a href="{{ route('twitter.login') }}"><img src="{{ asset('dashboard/img/twitter-box.png') }}"
                        alt="Twitter Icon"></a>
                <a href="{{ route('instagram.login') }}"><img src="{{ asset('dashboard/img/bxl-instagram-alt.png') }}"
                        alt="Instagram Icon"></a>
                <a href="{{ route('pinterest.login') }}"><img src="{{ asset('dashboard/img/pinterest.png') }}"
                        alt="Pinterest Icon"></a>
                <a href="{{ route('linkedin.login') }}"><img src="{{ asset('dashboard/img/linkedin-square.png') }}" alt="LinkedIn Icon"></a>

                <a href="{{ route('reddit.login') }}"><img src="{{ asset('dashboard/img/reddit.png') }}"></a>
                {{-- <a href="#"><img src="{{ asset('dashboard/img/google-plus-square.png') }}" alt="Google Plus Icon"></a> --}}
            </div>
            <div class="modal-content-footer">
                <p>6 OF 24 CONNECTED SOCIAL PROFILES</p>
            </div>
        </div>
    </div>

    </div>

    <!-- Compose Modal Modal -->
    <div id="composeModal" class="composeModal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="composeClose">&times;</span>
            <div class="modal-content-head">
                <p>New Message/Post</p>
            </div>
            <div class="tags">
                <ul id="pgName">
                    {{-- @foreach ($channels as $item)
                        <li>
                                <a href="#"  onclick="selectedPage(this)" style="padding: 12px;" data-page_id="{{ $item->page_id }}" data-page_access_token="{{ $item->access_token }}">
                                    <img src="{{asset('img/fb-icon.png')}}" >{{ $item->page_name }}<span class="tag-close">&times;</span>
                                </a>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
            <form action="" id="newPost" enctype="multipart/form-data">
            @csrf
           
            <div id="pinterest_details" class="row-input">
                <!-- Pinterest extra fields will append here -->
            </div>
            
            <div class="message">
                    <textarea id="post_message" rows="5" placeholder="Type your message here..."></textarea>
                    <label class="filelabel">
                        <i class="fa fa-paperclip">
                        </i>
                        <input class="FileUpload1" id="FileInput" name="cover_photo" type="file" multiple
                            onchange="uploadImage()" />
                        <input type="hidden" id="uploaded_image" />
                        <input type="hidden" name="selected_accounts" id="selected_accounts" />
                    </label>
                    <img src="{{ asset('dashboard/img/emoji-smile.png') }}" alt="">
            </div>
            <!-- </form> -->

                {{--            Reddit start--}}
                <div class="links-postas">
                    <div class="postas">
                        <label for="reddit_title">Reddit Title</label>
                        <input type="text" name="reddit_title" id="reddit_title" style="width: 200px; padding: 5px 10px; border-radius: 5px; margin-left: 10px; border: 1px solid gray;">
                    </div>
{{--            </form>--}}
            <div class="postas">
{{--                <form action="">--}}
                    @csrf
                    <label for="">Reddit Community</label>
                    <select name="reddit_community" id="reddit_community">

                    </select>
            </div>
            {{--            Reddit end--}}





            <div class="links-postas">
                <div class="postas">
                    <label for="scheduled_datetime">Schedule Post</label>
                    <input type="datetime-local" name="scheduled_datetime" id="scheduled_datetime" style="width: 200px; padding: 5px 10px; border-radius: 5px; margin-left: 10px; border: 1px solid gray;">
                </div>
            </form>
                <div class="postas">
{{--                    <form action="">--}}
                        @csrf
                        <label for="">Post to Facebook as</label>
                        <select name="" id="">
                            <option value="">Published</option>
                            <option value="">Save</option>
                            <option value="">Private</option>
                        </select>
{{--                    </form>--}}
                </div>




                <div class="links">
                    <!-- <a href="#"><img src="{{ asset('dashboard/img/calendar-day.png') }}" alt=""></a> -->
                    <a href="#"><img src="{{ asset('dashboard/img/query-queue.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('dashboard/img/globe.png') }}" alt=""></a>
                </div>
            </div>
            <div class="footer">
                <!-- <a href="#">cancel</a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="#">save</a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="#">send for approval</a> -->
                <div>
                    <a href="#" id="sendBtn" class="sendBtn" data-toPost="" onclick="postToSocialMedia()">
                        send now
                    </a>
                    <img id="loader_send" style="width: 50px;display:none" src="{{ asset('dashboard/img/loader.gif') }}">
                </div>

            </div>
        </div>
    </div>





    <!-- Posting Status Modal -->
    <div id="postingStatusModal" class="modal">
        <h2>Posting Status</h2>
        <br>
        <div id="postingStatusModalContent">

        </div>
    </div>




    <!-- Create Pinterest New Board Modal -->
    <div id="pinterestNewBoardModal" class="modal">

       <form id="create_board_form"  >
            @csrf
            <h2 style="text-align: center">Create a new pinterest board</h2>
                <br>

                <h3>Name</h3>
                <input class="c-input" type="text" required name="board_name" id="board_name">
                <input type="hidden"   name="access_token_pin" id="access_token_pin" >
                <br><br>

                <h3>Description</h3>
                <textarea class="c-input" type="text" name="board_description" id="board_description"></textarea>
                <br><br>

                <h3>Privacy</h3>
                <select class="c-input" name="board_privacy" id="board_privacy">
                    <option selected  value="PUBLIC">PUBLIC</option>
                    <option value="PRIAVATE" >PRIAVATE</option>
                </select>
                <br><br>

                <button class="c-btn-blue" style="submit" id="" >Create Board</button>
                <br><br>
       </form>
    
    </div>




<!-- ********************************************************************************************************************************** -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            $("#create_board_form").submit(function(e) {
                e.preventDefault(); // prevent actual form submit
        
                var form = $(this);
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('pinterest.createNewBoard') }}",
                    data: form.serialize(), // serializes form input
                    success: function(data){
                       if(data.status=='success'){
                          toastr.success("Board added");
                          // -- updating the pin boards -- //
                          show_pinterest_fields(data.token);
                          // -- updating the pin boards -- //

                          $("#pinterestNewBoardModal").modal("hide");
                          $("#board_description").val("");
                          $("#board_name").val("");
                          $("#access_token_pin").val("");
                          $('#composeModal').show();
                       }
                       else{
                           console.log("error--",data.message.message);
                           toastr.error(data.message.message);
                       }
                    }
                });
            });
        });
        

        var imagesFiles = null;
        var facebook_userID = "";
        var pages_details = [];
        var pages_list = [];
        var pages_list_one = [];
        var channel_list = [];
        var idArray = [];
        var tokenArray = [];
        var pageName = [];
        var fb_access_token = "";
        var instagram_bus_acc_id = "";
        var pintrest_status = false;
        var pintrest_access_token = "";



        //SELECTED PAGES
        function selectedPages(element) {
            if ($(element).prop('checked')) {
                var id = $(element).data('page_id');
                var token = $(element).data('access_token');
                var secret_token = $(element).data('secert');
                var name = $(element).data('page_name');
                var account = $(element).data('account');

                pages_details.push({
                    "id": id,
                    "token": token,
                    "secret_token": secret_token,
                    "name": name,
                    "account": account,
                })

                console.log("pages_details", pages_details);
                console.log("pintrest_status----", pintrest_status);
                var pages_details_json = JSON.stringify(pages_details);
                $("#sendBtn").attr("data-toPost", pages_details_json);
                $("#selected_accounts").val(pages_details_json);

            } else {
                var id = $(element).data('page_id');
                var token = $(element).data('access_token');
                var name = $(element).data('page_name');
                var indexTo = $(element).data('data-index');
                var account = $(element).data('account');
               
                
                // --- Remving the chaneel from Array--- //
                pages_details = pages_details.filter(item => item.id != id);
                console.log("after-------splice", pages_details);
                
                var pages_details_json = JSON.stringify(pages_details);
                $("#sendBtn").attr("data-toPost", pages_details_json);
                $("#selected_accounts").val(pages_details_json);
                // --- Remving the chaneel from Array--- //

            }


            var li = '';
            var image = "";
            $("#pinterest_details").empty();
            $.each(pages_details, function(index, value) {
                
                if (value['account'] == "instagram") {
                    image = "dashboard/img/insta-icon.png";
                } else if (value['account'] == "fb_page" || value['account'] == "fb_group") {
                    image = "dashboard/img/fb-icon.png";
                } else if (value['account'] == "pinterest") {
                    // pintrest_status = true;
                    // pintrest_access_token = value['token'];
                    show_pinterest_fields(value['token']);
                    image = "dashboard/img/pinterest-icon.png";
                } else if (value['account'] == "twitter") {
                    image = "dashboard/img/twit-icon.png";
                } else if (value['account'] == "linkedin") {
                    image = "dashboard/img/linkedin-icon.png";
                } else if (value['account'] == "reddit") {
                    // image = "dashboard/img/linkedin-icon.png";
                    show_redditt_fields(value['token']);
                }
               
                li += ` <li id="${value['id']}">
                        <div href="#"  style="padding: 12px;" >
                            <img src="{{ asset('${image}') }}" >${value['name']}<span class="tag-close close_channel" id="channel_${index}" data-index="${index}" data-accessToken="${value['token']}" data-pageId="${value['id']}" onclick="close_channel(${value['id']})">&times;</span>
                        </div>
                </li>`;

            });
            console.log("afterssss-------pintrest_status", pintrest_status);
            $("#pgName").empty().append(li);
            // console.log(id)
            ;
        }



        function show_pinterest_fields(token){
            // <li id="${value['id']}">

              var li = ''
                var dataToPost = {
                    _token: '{{ csrf_token() }}',
                    accesstoken: token,
                };
                $.ajax({
                    url: "{{ route('pinterest.getUserBoards') }}",
                    method: "POST",
                    data: dataToPost,
                    success: function(boardsResponse) {
                        console.log("boards response ---- ",); 

                        var available_boards = boardsResponse.items;
                       
                       li +=  `
                            <div class="" >
                                    <input class="input-here" placeholder="Pin title" type="text" name="pin_title" id="pin_title">
                                </div>
                                <div class="" >
                                    <input class="input-here" placeholder="Destination link" type="text" name="pin_destination_link" id="pin_destination_link">
                                </div>
                                <div class="" >
                                    <input class="input-here" placeholder="Pin alt text" type="pin_alt_text" name="pin_alt_text" id="alt_text">
                                </div>
                                <div class="" >
                                    <select class="input-here" onchange="create_boards('`+token+`')" name="pintrest_board" id="pintrest_board" required>
                                        <option value="not-selected" selected hidden>👉 Select board</option> `;
                                        $.each(available_boards, function(index, value) {
                     li +=  `              <option value="`+value['id']+`">`+value['name']+`</option>`;
                                        });
                     li +=                `<option value="create_board">▶ Create board</option>`;
                     li +=       ` </select>
                                </div>
                            `;

                        $("#pinterest_details").empty().append(li);
                    }
                });
        }


        // get Reddit Communities
        function show_redditt_fields(token){

            var li = ''
            var dataToPost = {
                _token: '{{ csrf_token() }}',
                accesstoken: token,
            };
            $.ajax({
                url: "{{ route('reddit.moderator') }}",
                method: "POST",
                data: dataToPost,
                success: function(data) {
                    console.log("reddit boards response ---- ",);
                    console.log(data);

                    $options = "<option value='' disabled selected>Select Community</option>";
                    $.each(data.message,function (index, value) {
                        $options += "<option value='" + value + "'>" + value + "</option>";
                    });
                    jQuery("#reddit_community").html(" ");
                    jQuery("#reddit_community").append($options);

                }
            });
        }


      
        function postToSocialMedia() {

            var pagesToPost = $("#sendBtn").attr("data-topost");
            var postMessage = $("#post_message").val();
            var uploaded_image = $("#uploaded_image").val();
            var pin_title = $("#pin_title").val();
            var pin_destination_link = $("#pin_destination_link").val();
            var alt_text = $("#alt_text").val();
            var pintrest_board = $("#pintrest_board").val();
            var scheduled_datetime = $("#scheduled_datetime").val();
            var reddit_title = $("#reddit_title").val();
            var reddit_community = $("#reddit_community").val();

            pagesToPost = JSON.parse(pagesToPost);

            
            if (!uploaded_image) {
                let imageFound = false;
                pagesToPost.map((page) => {
                    if (page.account == "instagram" || page.account == "pinterest") {
                        imageFound = true;
                    }
                });
                if (imageFound == true) {
                    toastr.error("Image uploading is necessary during Instagram and Pinterest posting");
                    return false;
                }
            }

            if (pintrest_board == "not-selected") {
                alert('Pinterest board should be selected');
            }

            
            if (postMessage) {
                $("#sendBtn").hide();
                $("#loader_send").show();

                console.log("pagesToPost---", pagesToPost);

                //  Working Method to Post on linked Channels

                var error = true;
                console.log(postMessage);
                //-- postingToSocialMedia -- //
                //-- postingToSocialMedia -- //
                var dataToPost = {
                    _token: '{{ csrf_token() }}',
                    pagesToPost: pagesToPost,
                    postMessage: postMessage,
                    uploaded_image: uploaded_image,
                    pin_title: pin_title,
                    pin_destination_link: pin_destination_link,
                    pin_alt_text: alt_text,
                    pintrest_board: pintrest_board,
                    reddit_title: reddit_title,
                    reddit_community: reddit_community,
                    scheduled_datetime: scheduled_datetime
                };
                $.ajax({
                    url: "{{ route('postToSocialMedia') }}",
                    method: "POST",
                    data: dataToPost,
                    success: function(response) {
                        if (response) {
                            
                            if (response.status == "scheduled") {

                                var msgToDisplay = `<p>${response.message}</p>`;

                                $("#postingStatusModalContent").empty().append(msgToDisplay);

                                $("#postingStatusModal").modal({
                                    fadeDuration: 100,
                                    closeExisting: false
                                });

                                toastr.success(`${response.message}`);

                                $("#sendBtn").data('topost', "");
                                $("#post_message").val('');
                                $("#pin_title").val('');
                                $("#pin_destination_link").val('');
                                $("#alt_text").val('');
                                $("#pintrest_board").val('');
                                $(".composeModal").hide();

                            }

                            if (response.status == "success") {
                                console.log("resoinsee----", response.message);
                                var details = response.message;
                                var msgToDisplay = '';
                                var status = '';
                                $.each(details, function(index, value) {
                                    index = index + 1;
                                    console.log("Type----", value['type']);
                                    if (value['status'] == true) {
                                        status = "<span style='color:green;'>Published</span>";
                                    } else {
                                        status = "<span style='color:red'>Failed (" + value['message'] +
                                            ")</span>";
                                    }
                                    if (value['type'] == "instagram") {
                                        msgToDisplay += "<p> " + index +
                                            "). Instagram post to account <b>" + value['account_name'] +
                                            "</b> : " + status + " </p><br>";
                                    } else if (value['type'] == "facebook_page") {
                                        msgToDisplay += "<p> " + index +
                                            "). Facebook post to page <b>" + value['account_name'] +
                                            "</b> : " + status + " </p><br>";
                                    } else if (value['type'] == "twitter") {
                                        msgToDisplay += "<p> " + index +
                                            "). Twitter post to account <b>" + value['account_name'] +
                                            "</b> : " + status + " </p><br>";
                                    }
                                    else if (value['type'] == "pinterest") {
                                        msgToDisplay += "<p> " + index +
                                            "). Pinterest post to account <b>" + value['account_name'] +
                                            "</b> : " + status + " </p><br>";
                                    } else if (value['type'] == "linkedin") {
                                        msgToDisplay += "<p> " + index +
                                            "). LinkedIn post to account <b>" + value['account_name'] +
                                            "</b> : " + status + " </p><br>";
                                    }
                                });

                                $("#postingStatusModalContent").empty().append(msgToDisplay);

                                $("#postingStatusModal").modal({
                                    fadeDuration: 100,
                                    closeExisting: false
                                });


                                $("#sendBtn").data('topost', "");
                                $("#post_message").val('');
                                $("#pin_title").val('');
                                $("#pin_destination_link").val('');
                                $("#alt_text").val('');
                                $("#pintrest_board").val('');
                                $(".composeModal").hide();

                            }
                            
                            if (response.status == "error") {
                                toastr.error("Something went wrong try again.");
                            }
                            // -- Hidding loader -- //

                            $("#sendBtn").show();
                            $("#loader_send").hide();

                            // -- Hidding loader -- //

                        }
                    }
                });

                //-- postingToSocialMedia -- //

            } else {
                alert("Message should not be empty");
            }
            
        }

        //RESTRICT COMPOSER MODEL TO OPEN, WHEN NO SOCIAL LINK WILL BE CHECKED
        function openComposer() {
            console.log("pages_details", pages_details.length);
            if (pages_details.length != 0) {
                $('#composeModal').show();
            } else {
                toastr.error("Please selected at least one Channel");

            }
        }
        


        function close_channel(pageID) {
            console.log("pageID event", pageID);

            var pagesToPost = $("#sendBtn").attr("data-topost");

            pagesToPost = JSON.parse(pagesToPost);
            console.log("pagesToPost-----Before", pagesToPost);
            pagesToPost = pagesToPost.filter(item => item.id != pageID);
            console.log("pagesToPost-----After", pagesToPost);
            var pages_details_json = JSON.stringify(pagesToPost);

            $("#sendBtn").attr("data-toPost", pages_details_json);
            $("#selected_accounts").val(pages_details_json);
            $("#" + pageID).hide();
        }


        //SAVE IMAGE IN FOLDER
        function uploadImage() {
            $("#sendBtn").hide();
            $("#loader_send").show();
            var formData = new FormData($('#newPost')[0]);

            console.log(formData);
            // formData.append('tax_file', $('input[type=file]')[0].files[0]);

            $.ajax({
                method: "POST",
                url: "{{ route('socialUploadImage') }}",
                data: formData,
                //use contentType, processData for sure.
                contentType: false,
                processData: false,
                cache: false,

                success: function(msg) {
                    console.log("image responsee...", msg.data);
                    if (msg.status == "success") {
                        let imgArray = JSON.stringify(msg.data);
                        $("#uploaded_image").val(imgArray);
                    }

                    $("#sendBtn").show();
                    $("#loader_send").hide();
                },
                error: function(error) {
                    console.log("image responsee error...", error);
                    toastr.error("Uploading error: " + error);
                    $("#sendBtn").show();
                    $("#loader_send").hide();
                }
            });
        }

        // $('#pintrest_board').change()
        function create_boards(token){
            console.log("access token",token);
           $('#access_token_pin').val(token);
           var option = $( "#pintrest_board option:selected" ).val();

           if(option=="create_board"){
            $('#composeModal').hide();
            $("#pinterestNewBoardModal").modal(
                   {
                        fadeDuration: 100,
                        closeExisting: true
                    }
            );
           }
        //    alert(option);
        }







        // Get the modal
        var addNewModal = document.getElementById("addNewModal");

        // Get the button that opens the modal
        var addNewBtn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var addNewClose = document.getElementsByClassName("addNewClose")[0];

        // When the user clicks the button, open the modal
        addNewBtn.onclick = function() {
            addNewModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the addNewModal
        addNewClose.onclick = function() {
            addNewModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the addNewModal, close it
        window.onclick = function(event) {
            if (event.target == addNewModal) {
                addNewModal.style.display = "none";
            }
        }

    </script>
@endsection
