<center style="background-image:url(bg00.jpg);padding-top:20px;background-size:contain;padding-bottom:20px;">
    <div id='crmWebToEntityForm' class="arab" style="width:60%;padding:10px;background-color:#fff;">
        <div style="padding-top:20px;height:90px;width:100%;display:block;background-color:#06213e;">
            <span style="text-align:right;direction:ltr;font-size:180%;color:#fff;"><strong dir=ltr>Section 2: Grammar:
                    Select the most suitable answer
                    for each question:</strong></span>
        </div><br><br>
        <META HTTP-EQUIV='content-type' CONTENT='text/html;charset=UTF-8'>

        <form wire:submit.prevent='save'>

            @foreach ($questions as $question)
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
            @endforeach

            @error('answers')
                <span style="color: red; font-size: 20px;">{{ $message }}</span>
            @enderror

            <br />
            <input class="arab" style='font-size:12px;color:#131307' type='submit' value='التالى' />
            <br><br>

            <style>
                table.tb10 {
                    width: 100%;
                    border-collapse: collapse;
                    direction: ltr;
                }

                table.tb10 td {
                    vertical-align: middle;
                }

                table.tb10 tr,
                table.tb10 td,
                table.tb10 p {
                    padding: 0;
                    margin: 0;
                }

                table.tb10 tr.heading td {
                    border: 1.5pt solid rgb(191, 191, 191);
                    background: rgb(103, 188, 209);
                }

                table.tb10 p {
                    text-align: center;
                    font-weight: bold;
                    font-size: 10pt;
                    font-family: "Century Gothic", sans-serif;
                    color: black;
                }

                table.tb10 tr.heading p {
                    color: white;
                }

            </style>
            <table class="tb10" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="heading">
                        <td colspan="2">
                            <p>Proficiency Level</p>
                        </td>
                        <td style="border-left:none;">
                            <p>Harvest Level</p>
                        </td>
                        <td colspan="2" style="border-left:none;border-bottom:1.5pt solid rgb(0,112,192);">
                            <p>CEFR</p>
                        </td>
                        <td nowrap style="border-left:none;">
                            <p>% Grade</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="width:23%;border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>True Beginner</p>
                        </td>
                        <td
                            style="width:2%;border-top:none;border-left:none;border-bottom:1.5pt solid rgb(191,191,191);border-right:1.5pt solid rgb(192,0,0);background:rgb(165,165,165);">
                        </td>
                        <td
                            style="width:25%;border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Scratch</p>
                        </td>
                        <td
                            style="width:2%;border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(168,208,141);">
                        </td>
                        <td rowspan="3"
                            style="width:23%;border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);">
                            <p>A1</p>
                        </td>
                        <td nowrap
                            style="width:25%;border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>0-10 %</p>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap
                            style="border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>Beginner</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(191,191,191);border-right:1.5pt solid rgb(192,0,0);background:rgb(237,125,49);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Starter</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(168,208,141);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>11-45%</p>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap rowspan="3"
                            style="border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>Elementary</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:red;">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 1</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);background:rgb(168,208,141);">
                            <p></p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>46-50 %</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:red;">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 2</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(142,170,219);">
                        </td>
                        <td nowrap rowspan="3"
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);">
                            <p>A2</p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>51- 56%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(191,191,191);border-right:1.5pt solid rgb(192,0,0);background:red;">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 3</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(142,170,219);">
                            <p></p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>57 - 62%</p>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap rowspan="3"
                            style="border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>Pre-Intermediate</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:yellow;">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 4</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(142,170,219);">
                            <p></p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>63-68%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:yellow;">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 5</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(255,217,102);">
                        </td>
                        <td nowrap rowspan="3"
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);">
                            <p>B1</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>69-73%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(191,191,191);border-right:1.5pt solid rgb(192,0,0);background:yellow;">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 6</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(255,217,102);">
                            <p></p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>74-79%</p>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap rowspan="2"
                            style="border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>Intermediate</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(0,176,240);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 7</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);background:rgb(255,217,102);">
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>80- 83%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(191,191,191);border-right:1.5pt solid rgb(192,0,0);background:rgb(0,176,240);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 8</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(201,201,201);">
                        </td>
                        <td nowrap rowspan="3"
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);">
                            <p>B2</p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>84-85%</p>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap rowspan="4"
                            style="border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>Upper Intermediate</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(112,48,160);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 9</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(201,201,201);">
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>86-87%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(112,48,160);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 10</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);background:rgb(201,201,201);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>88-89%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(112,48,160);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 11</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(244,176,131);">
                        </td>
                        <td nowrap rowspan="3"
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);">
                            <p>C1</p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>90-91%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(191,191,191);border-right:1.5pt solid rgb(192,0,0);background:rgb(112,48,160);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 12</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(244,176,131);">
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>92-93%</p>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap rowspan="4"
                            style="border-right:1.5pt solid rgb(192,0,0);border-bottom:1.5pt solid rgb(192,0,0);border-left:1.5pt solid rgb(192,0,0);border-top:none;">
                            <p>Advanced</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(0,176,80);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 13</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);background:rgb(244,176,131);">
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>94-95 %</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(0,176,80);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 14</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(118,113,113);">
                        </td>
                        <td nowrap rowspan="3"
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);">
                            <p>C2</p>
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>96-97%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(192,0,0);background:rgb(0,176,80);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 15</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:none;border-right:1.5pt solid rgb(0,112,192);background:rgb(118,113,113);">
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>98- 99%</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(192,0,0);border-right:1.5pt solid rgb(192,0,0);background:rgb(0,176,80);">
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(0,112,192);">
                            <p>Level 16</p>
                        </td>
                        <td
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(0,112,192);border-right:1.5pt solid rgb(0,112,192);background:rgb(118,113,113);">
                        </td>
                        <td nowrap
                            style="border-top:none;border-left:none;border-bottom:1.5pt solid rgb(166,166,166);border-right:1.5pt solid rgb(166,166,166);">
                            <p>100%</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br><br><br><br>
        </form>
    </div>
</center>
