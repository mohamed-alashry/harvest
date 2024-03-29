<center style="background-image:url(bg00.jpg);padding-top:20px;background-size:contain;padding-bottom:20px;">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/IqgEURTLWqw?autoplay=1&controls=0"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
    <div id='crmWebToEntityForm' class="arab" style="width:60%;padding:10px;background-color:#fff;">
        <div style="padding-top:20px;height:90px;width:100%;display:block;background-color:#06213e;">
            <span style="text-align:right;direction:ltr;font-size:180%;color:#fff;"><strong dir=ltr>
                    تحديد مستوى مجاني</strong></span>

        </div><br><br>
        <META HTTP-EQUIV='content-type' CONTENT='text/html;charset=UTF-8'>

        <form wire:submit.prevent='save'>

            <input wire:model.lazy='name' class="arab" type='text' style='width:100%;' placeholder="الإسم بالكامل"
                required>
            @error('lazy')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <input wire:model.lazy='email' class="arab" type='text' style='width:100%;' placeholder="البريد الإلكتروني"
                required>
            @error('email')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <input wire:model.lazy='mobile' class="arab" type='text' style='width:100%;'
                placeholder="رقم الهاتف / المحمول" required>
            @error('mobile')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <select wire:model="branch_id" class="arab" style='width:101%; height: 30px;' required>
                <option value=""> اختر الفرع </option>
                @foreach ($branches as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('branch_id')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <div>
                الجنس:
                <label>
                    <input wire:model="gender" type="radio" value="male">ذكر
                </label>

                <label>
                    <input wire:model="gender" type="radio" value="female">انثى
                </label>

            </div>
            @error('gender')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <input wire:model.lazy='job' class="arab" type='text' style='width:100%;' placeholder="الوظيفة" required>
            @error('job')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <input wire:model.lazy='university' class="arab" type='text' style='width:100%;'
                placeholder="الكلية إذا كنت طالب">
            @error('university')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror
            <br /><br />

            <input class="arab" style='font-size:12px;color:#131307' type='submit' value='سجل وإبدأ الإختبار الآن' />

            <br><br><br><br><br>
        </form>
    </div>
</center>
