<center style="background-image:url(bg00.jpg);padding-top:20px;background-size:contain;padding-bottom:20px;">
    <div id='crmWebToEntityForm' class="arab" style="width:60%;padding:10px;background-color:#fff;">
        <div style="padding-top:20px;height:90px;width:100%;display:block;background-color:#06213e;">
            <span style="text-align:right;direction:ltr;font-size:180%;color:#fff;"><strong dir=ltr>Section 4: Writing:
                    Select the most suitable answer
                    for each question:</strong></span>
        </div><br><br>
        <META HTTP-EQUIV='content-type' CONTENT='text/html;charset=UTF-8'>

        <form wire:ignore wire:submit.prevent='save'>

            @foreach ($questions as $question)
                <span style="text-align:justify;float:left;direction:ltr;font-size:150%;display:inline-block;">
                    <strong dir=ltr style="line-height:30px;color:blue;">Q{{ $loop->iteration }}:
                        {{ $question->question }}</strong>
                </span>
                <div class="clearfix"></div>
                <br>

                @if ($question->photo)

                    <img src="{{ asset('uploads/' . $question->photo) }}" width="100%" height="100%"><br><br>
                @endif

                <span
                    style="text-align:left;direction:ltr;float:left;font-weight:bold;color:blue;font-size:140%;"><strong
                        dir=ltr>Ideas to help</strong></span><br /><br />
                <div class="clearfix"></div>

                @foreach ($question->children as $idea)
                    <div style="text-align:left;" dir=ltr>
                        - <span style="color:darkblue;font-size:140%;">
                            {{ $idea->question }}</span>
                    </div>
                @endforeach

                <br>

                <textarea wire:model.lazy='answers.{{ $question->id }}' class="arab"
                    style="width:100%;height:100%;text-align:left;direction:ltr;" rows="10"></textarea>
                <br><br>

                @if (!$loop->last)
                    <br>
                    <hr>
                @endif
            @endforeach

            @error('answers')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror

            <br />
            <input class="arab" style='font-size:12px;color:#131307' type='submit' value='التالى' />
            <br><br>

            <br><br><br><br><br>
        </form>
    </div>
</center>
