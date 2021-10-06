<!doctype html>
<html lang="ar">

<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Payment Invoice</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<style>
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        padding: 30px;
        background: #fff;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0 15px;
        50px rgba(0, 0, 0, .2)
    }

    .image {
        width: 200px;
        height: 200px;
        background: url(authr.jpg);
        background-size: cover;
        float: left;
        margin: 30px 30px 30px 0;
    }

    .line {
        font-size: 16px;
        font-weight: bold;
        direction: rtl;
    }

    @media print {
        .pagebreak {
            clear: both;
            page-break-after: always;
        }
    }

    * {
        font-family: DejaVu Sans, sans-serif;
    }

</style>

<body>


    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div>
                                <div class="row mb-4">
                                    <div class="col-sm-2">
                                        <img class="navbar-brand-minimized" src="{{ asset('dashboard logo.png') }}"
                                            style="width: 90%;" alt="Harvest Logo">
                                    </div>

                                    <div class="col-sm-8 text-center">
                                        {{ $leadPayment->print_count == 1 ? 'Original' : 'Copy' }}
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-2">
                                        Client ID
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->lead_id }}</strong>
                                    </div>

                                    <div class="col-sm-2">
                                        Client Name
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->lead->name['en'] }}</strong>
                                    </div>
                                </div>

                                @if ($leadPayment->paymentable_type == 'App\\Models\\ServiceFee')
                                    <h3 class="text-center border-top border-bottom mt-4">Training Program Details</h3>

                                    <div class="row mt-4">
                                        <div class="col-sm-2">
                                            Round ID
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group->sub_round_id ?? '_____' }}</strong>
                                        </div>

                                        <div class="col-sm-2">
                                            Start Date
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group->subRound->start_date ?? '_____' }}</strong>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="col-sm-2">
                                            Training Service
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->paymentable->trainingService->title }}</strong>
                                        </div>

                                        <div class="col-sm-2">
                                            Days
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group ? config('system_variables.timeframes.days')[$leadPayment->group->days] : '____' }}</strong>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="col-sm-2">
                                            Time
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group->interval->name ?? '____' }}</strong>
                                        </div>
                                        <div class="col-sm-2">
                                            Level Start
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group->levels[0]->name ?? '____' }}</strong>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="col-sm-2">
                                            Branch
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group->branch->name ?? '____' }}</strong>
                                        </div>
                                        <div class="col-sm-2">
                                            Duration (Hours)
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>{{ $leadPayment->group->round->timeframe->total_hours ?? '____' }}
                                                H</strong>
                                        </div>
                                    </div>
                                @endif

                                @if ($leadPayment->paymentable_type == 'App\\Models\\ExtraItem')
                                    <h3 class="text-center border-top border-bottom mt-4">Extra Item</h3>

                                    <div class="row mt-4">
                                        <div class="col-sm-2">
                                            Item
                                        </div>
                                        <div class="col-sm-10">
                                            <strong>{{ $leadPayment->paymentable->name }}</strong>
                                        </div>

                                        <div class="col-sm-2">
                                            Item Category
                                        </div>
                                        <div class="col-sm-10">
                                            <strong>{{ $leadPayment->paymentable->itemCategory->name }}</strong>
                                        </div>
                                    </div>
                                @endif

                                @if ($leadPayment->paymentable_type == 'App\\Models\\Offer')
                                    <h3 class="text-center border-top border-bottom mt-4">Offer</h3>

                                    <div class="row mt-4">
                                        <div class="col-sm-2">
                                            Offer
                                        </div>
                                        <div class="col-sm-10 mb-3">
                                            <strong>{{ $leadPayment->paymentable->title }}</strong>
                                        </div>

                                        <div class="col-sm-2">
                                            No of Levels
                                        </div>
                                        <div class="col-sm-9 border mb-3" style="height: 50px;">
                                        </div>

                                        <div class="col-sm-2">
                                            Items
                                        </div>
                                        <div class="col-sm-9 border mb-3" style="height: 50px;">
                                        </div>
                                    </div>
                                @endif

                                <h3 class="text-center border-top border-bottom mt-4">Payment Details</h3>

                                <div class="row mt-4">
                                    <div class="col-sm-2">
                                        Payment Plan
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->paymentPlan->title }}</strong>
                                    </div>

                                    <div class="col-sm-2">
                                        Price
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->amount }}</strong>
                                    </div>

                                    @if ($leadPayment->discount)
                                        <div class="col-sm-2">
                                            Discount
                                        </div>
                                        <div class="col-sm-10">
                                            <strong>{{ $leadPayment->discount }}</strong>
                                        </div>
                                    @endif

                                    <div class="col-sm-2">
                                        Total Paid
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->subPayments->where('paid', 1)->sum('amount') }}</strong>
                                    </div>
                                </div>

                                @if ($leadPayment->payment_plan_id == 1)
                                    <div class="table-responsive-sm my-4">
                                        @php
                                            $itiration = ['Deposit', 'First', 'Second', 'Third', 'Fourth'];
                                        @endphp
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach ($leadPayment->subPayments as $subPayment)
                                                    <tr>
                                                        <td>{{ $itiration[$loop->index] }} Payment:</td>
                                                        <td>{{ $subPayment->amount }}</td>
                                                        <td>{{ $itiration[$loop->index] }} Due Date:</td>
                                                        <td>{{ $subPayment->due_date }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>

                                <div class="row mt-5">
                                    <div class="col-sm-4 text-center">
                                        <div>Agent {{ auth()->user()->name }}</div>
                                        <div>Print Date: {{ now() }}</div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                        <div class="d-flex justify-content-around">
                                            <strong>Hot Line: 19545</strong>
                                            <strong>info@harvestcollege.co.uk</strong>
                                            <strong>www.harvestcollege.co.uk</strong>
                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <strong>Our Branches : Dokki - Nacr City - Zayed - New Cairo - Maadi - Haram
                                                - Shoubra - Alex</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pagebreak"></div>
                            <hr>

                            <div>
                                <div class="row mb-4">
                                    <div class="col-sm-2">
                                        <img class="navbar-brand-minimized" src="{{ asset('dashboard logo.png') }}"
                                            style="width: 90%;" alt="Harvest Logo">
                                    </div>

                                    <div class="col-sm-8 text-center">
                                        {{ $leadPayment->print_count == 1 ? 'Original' : 'Copy' }}
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-2">
                                        Client ID
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->lead_id }}</strong>
                                    </div>

                                    <div class="col-sm-2">
                                        Client Name
                                    </div>
                                    <div class="col-sm-10">
                                        <strong>{{ $leadPayment->lead->name['en'] }}</strong>
                                    </div>
                                </div>

                                <div class="mt-5" style="direction: rtl; text-align: right;">
                                    <p class="line">قواعد تغير الحجز والأسترداد ) رجاء قراءة هذا الجزء بعناية(
                                    </p>
                                    <p class="line">وضعت قواعد الحجز بغرض تنظيم برامج الشركة التدريبية علي
                                        النحو الذي يرضي عميلنا المميز
                                        حرصا علي
                                        صالح العميل والشركة.</p>
                                    <p>أقر أنا:
                                        ...................................................................................................................
                                        أن التزم بالبنود التالية:</p>

                                    <ul>
                                        <li class="line">يلتـزم المتدرب بإجــراء امتحـان تحـديد المستـوى
                                            بمجـرد ملء استمــارة الحجــز بحـد
                                            أقصـي
                                            3أيـام عمـل.
                                        </li>
                                        <li class="line">يلتـزم المتدرب بسداد كافة المصروفات والرســوم
                                            المستحقــة في موعـد أقصــاه أسبـوع
                                            قبل بدء
                                            الدبلومة التدريبية، و في حالة الدفعــات، يســدد
                                            المتدرب الأقســاط المستحقة في الميعاد والتاريخ المحدد من قبل الإدارة. و في
                                            حالة الإخلال، يحق للإدارة عدم
                                            السمـاح للمتدرب بالحضور حتي
                                            ســداد واستحقـاق كامل المدفوعات.</li>
                                        <li class="line">يتـم تحـديد موعد بـدء التدريب أثنـاء الحجــز أو خلال
                                            15يــوم عمـل بحد أقصي بعد
                                            إجراء
                                            امتحـان تحديد المستوى وسداد الرســوم.</li>
                                        <li class="line">يلتزم المتدرب بحضــور المحاضرات الـتدريبية بكتـاب
                                            هارفسـت والسـي دي خلال كل
                                            مستـوى. (فقط
                                            ........ جنيهاً مصرياً لكل مستوى).</li>
                                        <li class="line">يلتزم المحـاضر المختص بإجراء الحضور والغياب فى اول
                                            ثلاثين )٣٠( دقيقة من بداية كل
                                            محاضرة
                                            تدريبية ولا يسمح للمتدرب بالحضور بعد
                                            مرور ثلاثين )٣٠( دقيقة. وفى حالة التأخير، يحق للإدارة عدم السماح للمتدرب
                                            بالحضور وبالتالى سيعتبر غائباً
                                            عن تلك المحـاضرة.
                                        </li>
                                        <li class="line">فيما يتعلق بانتظام الحضور والغياب وفقاً للقواعد
                                            واللوائح الداخلية لهارفست، فإذا
                                            تغيب
                                            المتدرب مرتين من نفس المستوى، سيعتبر المتدرب
                                            مفصولاً من البرنامج التدريبى لهارفست حتى يتم اجراء طلب محاضرة تعويضية وذلك
                                            مقابل ١٠٠ جنيه مصري.
                                        </li>
                                        <li class="line">إذا تغيب المتدرب عن اليوم المحدد لإمتحان المستوى،
                                            سيتم إلغاء المستوي وبناء عليه،
                                            يقوم
                                            المتدرب بسداد ١٠٠ج لإعادة الإمتحان من خلال
                                            طلب محاضرة تعويضية. وفي حالة الرســوب، يقوم المتدرب بإعادة المستوى مقابل ٢٩٠
                                            ج للمستوى الواحد في نظام
                                            Smart.
                                        </li>
                                        <li class="line">في حالة عدم التزام المتدرب بحضور المستويات ال ُمس
                                            َّجل عليها خلال الفترة
                                            والمواعيد المحددة
                                            مسبقاً والتي تم الرد عليها بالموافقة، يتم خصم
                                            وإلغاء كل مستوى لم يتم الحضور فيه ولا يسمح بتعويضه مرة اخرى في وق ٍت لاحق.
                                        </li>
                                        <li class="line">يحق لإدارة هـارفسـت تغييـر مواعيـد الحضــور أثنـاء
                                            التدريب إذا أصبـح العدد أقل من
                                            10متدربين
                                            في نظام Smart.</li>
                                        <li class="line">تنتهي صلاحية الحجز بعد مرور ٦ اشهر من تاريخ التسجيل
                                            وذلك في حالة عدم الحضور وعدم
                                            اجراء طلب
                                            تأجيل.</li>
                                        <li class="line">ختلف شروط واحكام حضور الدورات التدريبية لعميل نظام
                                            VIP.</li>
                                        <li class="line">يحق للمتدرب إجراء طلب تحويل بغرض تغيير الميعاد أو
                                            المحاضر بشرط إنتهاء المستوى
                                            وتقديم سبب
                                            مقبول للحصول على موافقة الإدارة. يتم
                                            إجراء هذا الطلب مجاناً للمرة الأولى ويسدد المتدرب مبلغ ٥٠ جنيه مصري للمرة
                                            الثانية. )حد أقصي ٤ طلبات(.
                                        </li>
                                        <li class="line">يحق للمتدرب إجراء طلب تحويل من فــرع لفــرع آخـر
                                            بشـرط اجتياز امتحان المستوى
                                            وموافقـة
                                            الإدارة وذلك مقـابل 100جنيهاً مصرياً.</li>
                                        <li class="line">يحق للمتدرب إجراء طلب تجميد الدبلومة بحد أقصــي ٣
                                            شهــور وذلك مقابل مبلغ
                                            100جنيهاً مصرياً
                                            للتجميد عن كل شهر .</li>
                                    </ul>
                                    <div class="mt-4 d-flex justify-content-between">
                                        <p>بيانات العميل:</p>
                                        <p class="line">الإسم ---------------</p>
                                        <p class="line">التوقيع ---------------</p>
                                        <p class="line">التاريخ ---------------</p>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-sm-4 text-center">
                                        <div>Agent {{ auth()->user()->name }}</div>
                                        <div>Print Date: {{ now() }}</div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                        <div class="d-flex justify-content-around">
                                            <strong>Hot Line: 19545</strong>
                                            <strong>info@harvestcollege.co.uk</strong>
                                            <strong>www.harvestcollege.co.uk</strong>
                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <strong>Our Branches : Dokki - Nacr City - Zayed - New Cairo - Maadi - Haram
                                                - Shoubra - Alex</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    {{-- <script>
        const export2Pdf = async () => {

            let printHideClass = document.querySelectorAll('.print-hide');
            printHideClass.forEach(item => item.style.display = 'none');
        }
    </script> --}}
</body>

</html>
