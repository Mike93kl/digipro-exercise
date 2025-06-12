<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
        rel="stylesheet"
        as="style"
        onload="this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Work+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>DigiPro Exercise</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @livewireStyles


</head>
<body>



<div class="layout-container flex h-full grow flex-col">
    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#e7edf4] px-10 py-3">
        <div class="flex items-center gap-4 text-[#0d141c]">

            <h2 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em]">DigiPro Exercise</h2>
        </div>
    </header>

    @if (session()->has('success'))
        <div
            id="success-msg"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
            role="alert"
        >

            <span class="block sm:inline">{{ session('success') }}</span>
            <span
                id="close-success-msg"
                class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
            >
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586l-2.938 2.938a1 1 0 101.414 1.414L10 10.828l2.938 2.938a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/>
            </svg>
        </span>
        </div>
    @endif

    @if (session()->has('error'))
        <div
            id="error-msg"
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
            role="alert">

            <span class="block sm:inline">{{ session('error') }}</span>
            <span
                class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                id="close-error-msg"
            >
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586l-2.938 2.938a1 1 0 101.414 1.414L10 10.828l2.938 2.938a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/>
            </svg>
        </span>
        </div>
    @endif

    {{$slot}}
</div>




@livewireScripts

<script>

    const closeErrorMsg = document.getElementById('close-error-msg');
    const closeSuccessMsg = document.getElementById('close-success-msg');

    closeErrorMsg.addEventListener('click', function () {
        document.getElementById('error-msg').remove();
    });

    closeSuccessMsg.addEventListener('click', function () {
        document.getElementById('success-msg').remove();
    })

</script>
</body>

</html>
