<div>
    <h1 class="text-2xl font-bold">Personal Information</h1>
    <div class="flex flex-row w-full">
        <div class="flex flex-col w-full">
            <x-input-label for="presentAddress" :value="__('Present Address')" />
            <x-text-input wire:model='address' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="flex flex-col ml-4 w-full">
            <x-input-label for="city" :value="__('Barangay')" />
            <x-text-input x-on-click wire:model='bar' class="block mt-1 w-full" type="text" readonly
                x-data="" x-on:click.prevent="$dispatch('open-modal', 'barangay-modal')"
                x-on:focus="$dispatch('open-modal', 'barangay-modal')" />
            <x-input-error :messages="$errors->get('barangayID')" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-row mt-4">
        <div class="flex flex-col w-full">
            <x-input-label for="city" :value="__('Municipality')" />
            <x-text-input wire:model='mun' class="block mt-1 w-full" type="text" readonly />
        </div>
        <div class="flex flex-col ml-4 w-full">
            <x-input-label for="province" :value="__('Province')" />
            <x-text-input wire:model='prov' class="block mt-1 w-full" type="text" readonly />
        </div>
    </div>
    <div class="flex flex-row mt-4">
        <div class="flex flex-col w-full">
            <x-input-label for="civilstatus" :value="__('Civil Status')" />
            <select wire:model='civilstatus' class="block mt-1 w-full rounded">
                <option value="" disabled selected>Select Civil Status</option>
                <option value="1">Single</option>
                <option value="2">Married</option>
                <option value="3">Widowed</option>

            </select>
            <x-input-error :messages="$errors->get('civilstatus')" class="mt-2" />
        </div>
        <div class="flex flex-col ml-4 w-full">
            <x-input-label for="religion" :value="__('Religion')" />
            <select wire:model='' class="block mt-1 w-full rounded">
                <option value="" disabled selected>Select Religion</option>
                <option value="2">ASSEMBLY OF GOD</option>
                <option value="3">AGLIPAYAN</option>
                <option value="4">BORN AGAIN CHRISTIAN</option>
                <option value="5">BAPTIST</option>
                <option value="6">BUDDIST</option>
                <option value="7">CHURCH OF GOD THRU CHRIST JESUS</option>
                <option value="8">C/option>
                <option value="9">CHURCH OF CHRIST</option>
                <option value="10">CHURCH OF GOD</option>
                <option value="25">CHURCH OF LATTER DAY SAINT</option>
                <option value="11">EPISCOPALIAN ANGELICAN</option>
                <option value="12">ESPIRITISM</option>
                <option value="13">EVANGELICAL</option>
                <option value="15">FAITH TABERNACLE</option>
                <option value="14">FOUR SQUARE GOSPEL CHURCH</option>
                <option value="31">FOURTH WATCH</option>
                <option value="16">HINDU</option>
                <option value="19">IGLESIA NG DIYOS KAY CRISTO JESUS</option>
                <option value="18">IGLESIA NI CRISTO</option>
                <option value="17">IGLESIA SA DIYOS ESPIRITU SANTO</option>
                <option value="20">ISLAM</option>
                <option value="22">JEHOVAH'S WITNESSES</option>
                <option value="21">JESUS MIRACLE CRUSADE</option>
                <option value="23">LUTHERAN</option>
                <option value="24">METHODIST</option>
                <option value="26">NON-SECTORAL CHARISMATIC</option>
                <option value="HRISTIAN<27">ORTHODOX</option>
                <option value="28">OTHERS</option>
                <option value="29">PENTECOSTAL</option>
                <option value="30">PHILIPPINE INDEPENDENT CHRISTIAN CHURCH(PICC/IFI)</option>
                <option value="32">PRESBYTERIAN</option>
                <option value="33">PROTESTANT</option>
                <option value="35">RIZALIST</option>
                <option value="34">ROMAN CATHOLIC</option>
                <option value="36">SEVENTH DAY ADVENTIST</option>
                <option value="1">TWELVE TRIBES OF ISRAEL</option>
                <option value="38">UNION ESPIRITISTA CRISTIANA</option>
                <option value="37">UNITED CHURCH CHRISTIAN OF THE PHILIPPINES (UCCP)</option>
                <option value="39">WESLEYAN CHURCH</option>
                <option value="40">WORD OF HOPE</option>
                <option value="41">OTHER</option>
            </select>
            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
        </div>
    </div>

    <div class="flex flex-row mt-4">
        <div class="flex flex-col w-full">
            <x-input-label for="phone" :value="__('Cellphone No.')" />
            <x-text-input wire:model='' class="block mt-1 w-full" type="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="flex flex-col ml-4 w-full">
            <x-input-label for="tin" :value="__('TIN')" />
            <x-text-input wire:model='tin' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('tin')" class="mt-2" />
        </div>
        <div class="flex flex-col ml-4 w-full">
            <x-input-label for="height" :value="__('Height')" />
            <x-text-input wire:model='height' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('height')" class="mt-2" />
        </div>
    </div>


    <div class="flex flex-row mt-4" x-data="{ otherDisability: false }">
        <div class="flex flex-col w-full">
            <x-input-label for="disability" :value="__('Disability')" />
            <div class="flex flex-row space-x-4">
                <div
                    class="mb-[0.125rem] block min-h-[1.5rem] sm:min-h-auto sm:mb-[0.5rem] md:min-h-auto md:mb-[0.125rem] pl-[1.5rem]">
                    <input wire:model='disabilityBox'
                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                        type="checkbox" value="Visual" id="checkboxDefault1" name="disabilityBox[0]" />
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault1">
                        Visual
                    </label>
                </div>

                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                    <input wire:model='disabilityBox'
                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                        type="checkbox" value="Hearing" id="checkboxDefault2" name="disabilityBox[1]" />
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault2">
                        Hearing
                    </label>
                </div>

                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                    <input wire:model='disabilityBox'
                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                        type="checkbox" value="Speech" id="checkboxDefault3" name="disabilityBox[2]" />
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault3">
                        Speech
                    </label>
                </div>

                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                    <input wire:model='disabilityBox'
                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                        type="checkbox" value="Physical" id="checkboxDefault4" name="disabilityBox[3]" />
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault4">
                        Physical
                    </label>
                </div>

                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                    <input wire:model='disabilityBox'
                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                        type="checkbox" value="Mental" id="checkboxDefault5" name="disabilityBox[4]" />
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault5">
                        Mental
                    </label>
                </div>

                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                    <input x-model="otherDisability"
                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                        type="checkbox" value="Others" id="checkboxDefault6" name="disabilityBox[]" />
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault6">
                        Others
                    </label>
                </div>

            </div>

        </div>
        <div x-show="otherDisability" x-cloak class="flex flex-col ml-4 w-full">
            <x-input-label for="otherDisability" :value="__('Others')" />
            <x-text-input wire:model='otherDisability' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('')" class="mt-2" />
        </div>
    </div>

    <div class="flex flex-row mt-4 justify-end space-x-4">
        <x-secondary-button type="button">
            Previous
        </x-secondary-button>

        <x-blue-button wire:click.prevent='next' type="button">
            Next
        </x-blue-button>
    </div>


    <livewire:modals.barangay-modal />



</div>
