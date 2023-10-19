<x-mail::message>
# Welcome to Smart Apps
{{ $data['greetings']}}

This is a dummy email message sha oo

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
