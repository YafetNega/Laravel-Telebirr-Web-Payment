<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>American College of Technology - Telebirr Payment</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

</head>
<body>
    
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Make Payment
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">

                        <div class="card-container">
                    
                            <div class="front">
                                <div class="image">
                                    <img src="image/chip.png" alt="">
                                    <img src="image/telebirr.png" alt="">
                                    <img src="image/visa.png" alt="">
                                </div>
                                <div class="card-number-box">################</div>
                                <div class="flexbox">
                                    <div class="box">
                                        <span>Full Name</span>
                                        <div class="card-holder-name"></div>
                                    </div>
                                    <div class="box">
                                        <span>Total Amount</span>
                                        <div class="expiration">
                                            <!--<span class="exp-month"></span>-->
                                            <span class="exp-year"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="back">
                                <div class="stripe"></div>
                                <div class="box">
                                    <span>Payment Reason</span>
                                    <div class="cvv-box"></div>
                                    <img src="./image/visa.png" alt="">
                                </div>
                            </div>
                    
                        </div>
                    
                        @if(Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{Session::get('success')}}
                            </div>
                        @endif 

                        <form action="/store" method="POST" novalidate>
                            {{ csrf_field() }}
                            <div class="form-group inputBox">
                                <span>Full Name</span>
                                <input type="text" name="fullname" maxlength="15" class="card-holder-input form-control @error('fullname') is-invalid @enderror" id="fullname">
                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group inputBox">
                                <span>Phone Number</span>
                                <input type="number" name="phone" maxlength="13" class="card-number-input form-control @error('phone') is-invalid @enderror" id="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flexbox">
                                <div class="form-group inputBox">
                                    <span>Student ID</span>
                                    <input text="text" name="student_id" id="student_id" class="month-input form-control @error('student_id') is-invalid @enderror">
                                    @error('student_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group inputBox">
                                    <span>Total Amount</span>
                                    <input type="number" name="totalAmount" class="year-input form-control @error('totalAmount') is-invalid @enderror" id="totalAmount">
                                    @error('totalAmount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group inputBox">
                                    <span>Payment Reason</span>
                                    <select class="cvv-input form-control @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                                        <option selected disabled value="">Choose</option>
                                        <option value="Postgraduate Registration Fee">Postgraduate Registration Fee</option>
                                        <option value="Postgraduate Regular Tuition Fee">Postgraduate Regular Tuition Fee</option>
                                        <option value="Postgraduate Online Tuition Fee">Postgraduate Online Tuition Fee</option>
                                        <option value="Undergraduate Regular Tuition Fee">Undergraduate Regular Tuition Fee</option>
                                        <option value="Undergraduate Registration Fee">Undergraduate Registration Fee</option>
                                        <option value="MIU Comp Entrance Exam">MIU Comp Entrance Exam</option>
                                        <option value="Makeup Exam">Make-up Exam</option>
                                        <option value="Lost ID">Lost ID</option></option>
                                        <option value="Training">Training</option></option>
                                      </select>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" name="send" class="submit-btn">
                        </form>
                    
                    </div>  
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>

        document.querySelector('.card-number-input').oninput = () =>{
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
        }

        document.querySelector('.card-holder-input').oninput = () =>{
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
        }

        document.querySelector('.month-input').oninput = () =>{
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
        }

        document.querySelector('.year-input').oninput = () =>{
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        }

        document.querySelector('.cvv-input').onmouseenter = () =>{
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        }

        document.querySelector('.cvv-input').onmouseleave = () =>{
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        }

        document.querySelector('.cvv-input').oninput = () =>{
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
        }

    </script>

</body>

