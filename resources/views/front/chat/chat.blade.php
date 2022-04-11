@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        چت با متخصص
    @else
        Chat
    @endif
@endsection
@section('content')
    {{-- find who is another contact --}}
    @if (auth()->user()->id == $selectedchat->user_1)
        @php
            $other = $selectedchat->user2;
            // use for blocking
            $otheradad = '2';
        @endphp
    @else
        @php
            $other = $selectedchat->user1;
            // use for blocking
            $otheradad = '1';
        @endphp
    @endif
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <div class="gray-bg rounded-3 pt-3 ps-md-5 pe-md-5 ps-1 pe-1 pb-2 w-100" id="messages">

        </div>
        <!--chat input-->
        <div class="container-fluid">
            <form class=" w-100 d-flex justify-content-center ">
                @csrf
                <!--input msg-->
                <div class="w-100">
                    <input type="text" id="messagefield" class="form-control pt-2 pb-3"
                        placeholder="متن خود را وارد کنید ...">
                </div>

                <!--send button-->
                <div class="me-1 align-self-center">
                    <button type="submit" id="sub" class="btn darkgreen p-2 ps-3 pe-3 text-white text-center fw-bold">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
                <input type="hidden" id="chat_id" name="chat_id" value="{{ $selectedchat->id }}">
                <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $other->id }}">
            </form>
        </div>
    @else
        <div class="gray-bg rounded-3 pt-3 ps-md-5 pe-md-5 ps-1 pe-1 pb-2 w-100" id="messages">
            <!--chat input-->

        </div>
        <div class="container-fluid">
            <form class="mt-5 w-100 d-flex justify-content-center">
                @csrf
                <!--input msg-->
                <div class="w-100">
                    <input type="text" id="messagefield" class="form-control pt-2 pb-3" placeholder=" type here ... ">
                </div>

                <!--send button-->
                <div class="ms-1 align-self-center">
                    <button type="submit" id="sub" class="btn darkgreen p-2 ps-3 pe-3 text-white text-center fw-bold">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
                <input type="hidden" id="chat_id" name="chat_id" value="{{ $selectedchat->id }}">
                <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $other->id }}">
            </form>
        </div>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // get message functions
            function getmessage() {
                $.ajax({
                    url: "{{ route('user.chat.message.get', $selectedchat->id) }}",
                    type: 'get',
                    success: function(data) {
                        var box = $("#messages");
                        box.html(" ")
                        data.selectedchat.messages.forEach(message => {
                            // making main div
                            if (message.sender_id == {{ auth()->user()->id }}) {
                                //    making main div for me
                                var maindiv = document.createElement("div");
                                maindiv.classList.add("w-100")
                                maindiv.classList.add("mb-3")
                                maindiv.classList.add("d-flex")
                                maindiv.classList.add("flex-column")
                                maindiv.classList.add("align-items-end")

                                // making p for showing name
                                var nametag = document.createElement("p");
                                nametag.classList.add("gray-text")
                                nametag.classList.add("m-0")
                                nametag.classList.add("mb-1")
                                nametag.classList.add("ms-3")
                                var name = document.createTextNode(
                                    "{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}"
                                )
                                nametag.append(name)
                                maindiv.append(nametag)

                                // making div for message
                                var messagediv = document.createElement("div")
                                messagediv.classList.add("chat-box-width")
                                messagediv.classList.add("rounded-3")
                                messagediv.classList.add("white-background")
                                messagediv.classList.add("p-3")
                                messagediv.classList.add("pb-2")



                                // making p tag for message
                                var messagetag = document.createElement("p");
                                messagetag.classList.add("text_justify")
                                var msg = document.createTextNode(message.message)
                                messagetag.append(msg)
                                messagediv.append(messagetag)
                                maindiv.append(messagediv)
                            } else {
                                var maindiv = document.createElement("div");
                                maindiv.classList.add("w-100")
                                maindiv.classList.add("mb-3")
                                // making p for showing name
                                var nametag = document.createElement("p");
                                nametag.classList.add("gray-text")
                                nametag.classList.add("m-0")
                                nametag.classList.add("mb-1")
                                nametag.classList.add("me-3")
                                var name = document.createTextNode(
                                    "{{ $other->firstname }} {{ $other->lastname }}")
                                nametag.append(name)
                                maindiv.append(nametag)
                                // making div for message
                                var messagediv = document.createElement("div")
                                messagediv.classList.add("chat-box-width")
                                messagediv.classList.add("rounded-3")
                                messagediv.classList.add("white-background")
                                messagediv.classList.add("p-3")
                                messagediv.classList.add("pb-2")

                                // making p tag for message
                                var messagetag = document.createElement("p");
                                messagetag.classList.add("text_justify")
                                var msg = document.createTextNode(message.message)
                                messagetag.append(msg)
                                messagediv.append(messagetag)
                                maindiv.append(messagediv)
                            }
                            box.append(maindiv)
                        });
                    }
                });

            }
            setInterval(getmessage, 5000)

            $("#sub").click(function(e) {
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var chat_id = $("#chat_id").val();
                var receiver_id = $("#receiver_id").val();
                var message = $("#messagefield").val();
                $.ajax({
                    url: "{{ route('user.chat.message.send') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        chat_id: chat_id,
                        message: message,
                        receiver_id: receiver_id
                    },
                    success: function(data) {
                        $("#messagefield").val(" ")
                        if (data.fail != undefined) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: data.fail,
                                showConfirmButton: true,
                                timer: 5000
                            })
                        }
                        getmessage();
                    }
                });
            });
        })
    </script>
@endsection
