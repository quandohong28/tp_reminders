<div class="flex items-center justify-center py-8 px-4">
    <div class="max-w-sm w-full shadow-lg">
        <div class="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
            <div class="px-4 flex items-center justify-between">
                <button aria-label="calendar backward" wire:click="previous"
                    class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </button>
                <span tabindex="0"
                    class="focus:outline-none  text-base font-bold dark:text-gray-100 text-gray-800">{{ $currentMonthName . ' ' . $currentYear }}</span>
                <button aria-label="calendar forward" wire:click="next"
                    class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="9 6 15 12 9 18" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-between pt-12 overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            @foreach ($weekDays as $day)
                                <th>
                                    <div class="w-full flex justify-center pb-3">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                            {{ $day }}
                                        </p>
                                    </div>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for ($day = 0; $day < $firstDayOfMonth; $day++)
                                <td class="pt-2">
                                    <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                </td>
                            @endfor
                            @for ($day = 1; $day <= $daysInMonth; $day++)
                                <td class="pt-2">
                                    <a href="#">
                                        <div
                                            class="{{ $day == $currentDay ? 'relative flex items-center justify-center w-full rounded-full cursor-pointer' : 'px-2 py-2 cursor-pointer flex w-full justify-center hover:bg-gray-200 rounded-lg' }}">
                                            <p
                                                class="{{ $day == $currentDay ? 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-lg' : 'text-base text-gray-500 dark:text-gray-100 font-medium' }}">
                                                {{ $day }}
                                            </p>
                                        </div>
                                    </a>
                                </td>
                                @if (($day + $firstDayOfMonth) % 7 == 0)
                        </tr>
                        <tr>
                            @endif
                            @endfor
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
