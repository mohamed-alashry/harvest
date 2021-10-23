<style>
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

</style>

<div>
    <div class="row mb-4">
        <div class="col-sm-2">
            <img class="navbar-brand-minimized" src="{{ asset('dashboard logo.png') }}" style="width: 90%;"
                alt="Harvest Logo">
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
                <strong>{{ $leadPayment->group->round->timeframe->total_hours ?? '____' }} H</strong>
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
            @php
                $sum = $leadPayment->subPayments->where('paid', 1)->sum('amount');
                $discount = $leadPayment->discount ?? 0;
                $totalPaid = $sum - $discount;
            @endphp
            <strong>{{ $totalPaid }}</strong>
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
                <strong>Our Branches : Dokki - Nacr City - Zayed - New Cairo - Maadi - Haram - Shoubra - Alex</strong>
            </div>
        </div>
    </div>
</div>

<div class="pagebreak"></div>
<hr>

<div>
    <div class="row mb-4">
        <div class="col-sm-2">
            <img class="navbar-brand-minimized" src="{{ asset('dashboard logo.png') }}" style="width: 90%;"
                alt="Harvest Logo">
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
        <p class="line">قواعد تغير الحجز والأسترداد ) رجاء قراءة هذا الجزء بعناية(</p>
        <p class="line">وضعت قواعد الحجز بغرض تنظيم برامج الشركة التدريبية علي النحو الذي يرضي عميلنا المميز
            حرصا علي
            صالح العميل والشركة.</p>
        <p class="line">النظــــام</p>
        <p class="line">لا يسمح بإستخدام الهاتف المحمول او تناول الأطعمة والمشروبات أثناء المحاضرة التدريبية.
        </p>
        <p class="line">لا يسمح للمتدرب بالحضور بنسخة مصورة من المواد العلمية لهارفست مثل الكتب والإسطوانات.
        </p>
        <p class="line">لا يسمح بالتحدث باللغة العربية قط أثناء المحاضرة وذلك لتحقيق فكرة مجتمع التواصل
            بالإنجليزية فقط.</p>

        <br>

        <p class="line">امتحــــان تحــديـد المستــــوى والمـدفـوعـــات</p>
        <p class="line">يلتـزم المتدرب بإجــراء امتحـان تحـديد المستـوى بمجـرد ملء استمــارة الحجــز بحـد
            أقصـي 3 أيـام عمـل</p>
        <p class="line">يلتـزم المتدرب بسداد كافة المصروفات والرســوم المستحقــة في موعـد أقصــاه أسبـوع قبل
            بدء الدبلومة التدريبية،
            و في حالة الدفعــات، يســدد المتدرب الأقســاط المستحقة في الميعاد والتاريخ المحدد من قبل الإدارة. و في حالة
            الإخلال، يحق للإدارة عدم السمـاح للمتدرب بالحضور حتي ســداد واستحقـاق كامل المدفوعات.
        </p>
        <p class="line">يتـم تحـديد موعد بـدء التدريب أثنـاء الحجــز أو خلال15 يــوم عمـل بحد أقصي بعد إجراء
            امتحـان تحديد المستوى
            وسداد الرســوم.
        </p>

        <br>

        <p class="line">السلــوكيــات والأخـلاقيــــات</p>
        <p class="line">يلتـزم المتدرب بإتباع آداب الـحـوار وقواعد اللبـاقة والذوق وحسـن المعـاملة اثناء
            التعامل مع الزملاء والزميلات
            المتدربين والمحاضرين وموظفي خدمة العملاء بالإدارة والعامليـن بالشركة وكافة القائميـن علي الشئــون التدريبية
            والإداريـة بالشـركـة.
        </p>
        <p class="line">يلتـزم المتدرب بحسن السيـر والسلـوك داخل الشركـة وعـدم إثــارة أي ضـوضـاء أو شغـب.
            وخلاف ذلك، يحق للإدارة فصل
            المتدرب من البرنامج التدريبي للدبلومة.</p>

        <br>

        <p class="line">الحضـــور والغيــــاب</p>
        <p class="line">يلتزم المتدرب بحضــور المحاضرات الـتدريبية بكتـاب هارفسـت والسـي دي خلال كل مستـوى.
            (فقط ........ جنيهاً
            مصرياً لكل مستوى).</p>
        <p class="line">يلتزم المحـاضر المختص بإجراء الحضور والغياب فى اول ثلاثين (30) دقيقة من بداية كل
            محاضرة تدريبية ولا يسمح
            للمتدرب بالحضور بعد مرور ثلاثين (30) دقيقة. وفى حالة التأخير، يحق للإدارة عدم السماح للمتدرب بالحضور
            وبالتالى سيعتبر غائباً عن تلك المحـاضرة.
        </p>
        <p class="line">فيما يتعلق بانتظام الحضور والغياب وفقاً للقواعد واللوائح الداخلية لهارفست، فإذا تغيب
            المتدرب مرتين من نفس
            المستوى، سيعتبر المتدرب مفصولاً من البرنامج التدريبى لهارفست حتى يتم اجراء طلب محاضرة تعويضية وذلك مقابل 100
            جنيه مصري.
            إذا تغيب المتدرب عن اليوم المحدد لإمتحان المستوى، سيتم إلغاء المستوي وبناء عليه، يقوم المتدرب بسداد 100ج
            لإعادة الإمتحان من خلال طلب محاضرة تعويضية. وفي حالة الرســوب، يقوم المتدرب بإعادة المستوى مقابل 290 ج
            للمستوى الواحد في نظام Smart.</p>

        <br>

        <p class="line">هــــــــــــــــــــــــــــــــام جداً :</p>
        <p class="line">في حالة عدم التزام المتدرب بحضور المستويات المُسجَّل عليها خلال الفترة والمواعيد
            المحددة مسبقاً والتي تم الرد
            عليها بالموافقة، يتم خصم وإلغاء كل مستوى لم يتم الحضور فيه ولا يسمح بتعويضه مرة اخرى في وقتٍ لاحق.
            يحق لإدارة هـارفسـت تغييـر مواعيـد الحضــور أثنـاء التدريب إذا أصبـح العدد أقل من10 متدربين في نظام Smart.
            تنتهي صلاحية الحجز بعد مرور 6 اشهر من تاريخ التسجيل وذلك في حالة عدم الحضور وعدم اجراء طلب تأجيل.
            تختلف شروط واحكام حضور الدورات التدريبية لعميل نظام VIP.
        </p>

        <br>

        <p class="line">طلبـــات التحـويـــل والتـجميـد</p>
        <p class="line">يحق للمتدرب إجراء طلب تحويل بغرض تغيير الميعاد أو المحاضر بشرط إنتهاء المستوى وتقديم
            سبب مقبول للحصول على
            موافقة الإدارة. يتم إجراء هذا الطلب مجاناً للمرة الأولى ويسدد المتدرب مبلغ 50 جنيه مصري للمرة الثانية. (حد
            أقصي 4 طلبات).
        </p>
        <p class="line">يحق للمتدرب إجراء طلب تحويل من فــرع لفــرع آخـر بشـرط اجتياز امتحان المستوى وموافقـة
            الإدارة وذلك مقـابل100
            جنيهاً مصرياً.
        </p>
        <p class="line">يحق للمتدرب إجراء طلب تجميد الدبلومة بحد أقصــي 3 شهــور وذلك مقابل مبلغ 100 جنيهاً
            مصرياً للتجميد عن كل شهر
            .</p>

        <br>

        <p class="line">الشهــــــادات</p>
        <p class="line">بمجـرد اجتيـاز أي مستـوى، يحـق للمتدرب استلام شهادة هارفست كوليـدج مقابل 450جنيهاً
            مصرياً أو طلب شهادة
            كامبريدج من لنـدن مقابل 40
            USDوأيضــاً شهـادة جامعـة عين شمس مقابل 550 جنيهاً مصرياً ويمكـن توثيقـها من وزارة الخارجيـة المصـرية برسوم
            أخرى.</p>

        <br>

        <p class="line">سياســــة الاستبــــدال والاستـــرداد</p>
        <p class="line">لا يحق للمتدرب استبدال/استرداد الرسوم قط وفقاً للقوانين واللوائح الصادرة عن الجهات
            التنظيمية وكذا المنصوص
            عليها لشركة هارفست بريتيش كوليدج.</p>

        <br>

        <p class="line">الشكــــاوى والمقتــرحـــات</p>
        <p class="line">للشكاوى والمقترحات، نرحـب بمـراسلتـكم عبر البريـد customercare@harvestcollege.co.uk
            وسنوافيكم بالرد خلال (7)
            أيام عمل. نشكركم على وقتكم وحسن تعاونكم معنا و نسعى للوصول لحسن ظنكم ..</p>

        <br>

        <p class="line text-center">بمجرد استلام إيصال الدفع باليد أو عن طريق البريد الإلكتروني او عن طريق الواتس اب
            يعتبر
            ذلك موافقة من ق ّبل
            العميل علي جميع الشروط والسياسات المذكورة أعلاه بإيصال الدفع.</p>
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
                <strong>Our Branches : Dokki - Nacr City - Zayed - New Cairo - Maadi - Haram - Shoubra - Alex</strong>
            </div>
        </div>
    </div>
</div>
