<div>
    <input x-data x-ref="input" type="text" class="form-control datepicker" autocomplete="off" data-provide="datepicker"
        data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"
        onchange="this.dispatchEvent(new InputEvent('input'))" {{ $attributes }}>
</div>
