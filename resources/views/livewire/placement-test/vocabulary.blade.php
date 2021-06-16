<center style="background-image:url(bg00.jpg);padding-top:20px;background-size:contain;padding-bottom:20px;">
    <div id='crmWebToEntityForm' class="arab" style="width:60%;padding:10px;background-color:#fff;">
        <div style="padding-top:20px;height:90px;width:100%;display:block;background-color:#06213e;">
            <span style="text-align:right;direction:ltr;font-size:180%;color:#fff;"><strong dir=ltr>Section 1:
                    Vocabulary: Select the most suitable answer
                    for each question:</strong></span>
        </div><br><br>
        <META HTTP-EQUIV='content-type' CONTENT='text/html;charset=UTF-8'>

        <form wire:submit.prevent='save'>

            @foreach ($questions as $question)
                <div wire:ignore>
                    <span style="text-align:left;direction:ltr;float:left;font-weight:bold;color:blue;font-size:140%;">
                        <strong dir=ltr>Q{{ $loop->iteration }}:
                            {{ $question->question }}</strong>
                    </span>
                    <div class="clearfix"></div>
                    <br />
                    <div style="text-align:left;" dir=ltr>

                        @foreach ($question->answers as $answer)
                            <label>
                                <input wire:model='answers.{{ $question->id }}' type='radio' class="arab"
                                    value="{{ $answer->id }}"><span style="color:darkblue;font-size:140%;">
                                    {{ $answer->answer }}</span>
                            </label>
                            <br />
                        @endforeach

                    </div><br><br>
                </div>
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
