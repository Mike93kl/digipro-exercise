<form wire:submit.prevent="submit" class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
        <div class="flex flex-wrap justify-between gap-3 p-4"><p class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight min-w-72">Create Quiz</p></div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Full Name</p>


                <input wire:model="fullName" autocomplete="off"
                       placeholder="Enter your full name"
                       class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                />
                @error('fullName') <span class="text-red-500">{{ $message }}</span> @enderror
            </label>
        </div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Email</p>
                <input wire:model="email" autocomplete="off"
                       placeholder="Enter your email"
                       class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"

                />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </label>
        </div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Number of Questions</p>
                <input autocomplete="off" type="number"
                    wire:model="numberOfQuestions"
                    placeholder="Enter the number of questions"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"

                />
                @error('numberOfQuestions') <span class="text-red-500">{{ $message }}</span> @enderror
            </label>
        </div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Difficulty</p>
                <select autocomplete="off"
                    wire:model="difficulty"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 bg-[image:--select-button-svg] placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                >
                    <option value="">Select difficulty</option>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                @error('difficulty') <span class="text-red-500">{{ $message }}</span> @enderror
            </label>
        </div>
        <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Type</p>
                <select autocomplete="off"
                    wire:model="type"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 bg-[image:--select-button-svg] placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                >
                    <option value="">Select type</option>
                    <option value="multiple">Multiple choice</option>
                    <option value="boolean">True / false</option>
                </select>
                @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
            </label>
        </div>
        <div class="flex px-4 py-3">
            <button type="submit"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#0c77f2] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em]"
            >
                <span class="truncate">Create Quiz</span>
            </button>
        </div>
    </div>
</form>
