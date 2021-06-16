<center style="background-image:url(bg00.jpg);padding-top:20px;background-size:contain;padding-bottom:20px;">
    <div id='crmWebToEntityForm' class="arab" style="width:60%;padding:10px;background-color:#fff;">
        <div style="padding-top:20px;height:90px;width:100%;display:block;background-color:#06213e;">
            <span style="text-align:right;direction:ltr;font-size:180%;color:#fff;"><strong dir=ltr>Section 4:
                    Listening:
                    Select the most suitable answer
                    for each question:</strong></span>
        </div><br><br>
        <META HTTP-EQUIV='content-type' CONTENT='text/html;charset=UTF-8'>

        <form wire:submit.prevent='save'>

            @foreach ($paragraphs as $paragraph)
                <div wire:ignore>
                    <span style="text-align:justify;float:left;direction:ltr;font-size:150%;display:inline-block;">
                        <strong dir=ltr style="line-height:30px;">{{ $paragraph->question }}</strong>
                        <p>
                            <audio controls>
                                <source src="{{ asset('uploads/' . $paragraph->photo) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </p>
                    </span>
                    <div class="clearfix"></div>
                    <br><br>

                    @foreach ($paragraph->children as $question)
                        <span
                            style="text-align:left;direction:ltr;float:left;font-weight:bold;color:blue;font-size:140%;">
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
                    @endforeach
                    @if (!$loop->last)
                        <br>
                        <hr>
                    @endif
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
