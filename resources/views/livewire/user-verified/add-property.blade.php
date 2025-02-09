<x-form-section submit="addProperty">
  <x-slot name="title">
      {{ __('Add Property') }}
  </x-slot>

  <x-slot name="description">
      {{ __('Adding a property to our real estate website is a seamless and empowering experience. Whether you\'re a seasoned real estate professional or a homeowner looking to list your property, our user-friendly platform makes it effortless to showcase your real estate asset to potential buyers or renters. With just a few clicks, you can input essential property details, upload high-quality images, and provide comprehensive descriptions to ensure your listing stands out. Our innovative tools also allow you to set pricing, and specify key features, for a truly immersive experience. By choosing to \'Add Property\' with us, you\'re taking the first step towards a successful and efficient real estate journey, connecting with the right audience and maximizing your property\'s visibility in the market.') }}
  </x-slot>
  <x-slot name="form">

    <section class="pb-5">
      <x-header-description 
        header="What type of property do you want to offer?" 
        description="Let's start with basic typology of the listing so that property seekers can find it under the right category on Mindanao Properties." 
      />
      
      {{-- Offer Type --}}
      <div class="pb-4">
        @error('offer_type_id')
          <span class="m" role="alert">
            <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
          </span>
        @enderror
  
        <x-header-label value="{{ __('Offer Type') }}" />
        <div class="flex gap-2">
          @foreach ($offer_type as $type)
          <div class="flex items-center pl-4 border-2 border-gray-400 rounded-md dark:border-gray-700 grow">
            <x-radio id="{{ $type->name }}" wire:model="offer_type_id" value="{{ $type->id }}" name="offer_type" />
            <x-label value="{{ $type->name }}" for="{{ $type->name }}" class="w-full py-3 ml-2 text-sm font-medium dark:text-gray-300 rounded-md" />
          </div>
          @endforeach
        </div>
      </div>
  
      {{-- Property Type -Input- --}}
      <div class="pb-4">
        @error('property_type_id')
          <span class="m" role="alert">
            <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
          </span>
        @enderror
        <x-header-label value=" {{ __('Property Type') }} " />
        <div class="flex gap-2">
          @foreach ($property_type as $type)
          <div class="flex items-center pl-4 border-2 border-gray-400 rounded-md dark:border-gray-700 grow">
            <x-radio name="property_type" id="{{ $type->name }}" value="{{ $type->id }}" wire:model="property_type_id" wire:click="wirePropertyClick('{{ $type->id }}')" />
            <x-label value="{{ $type->name }}"  for="{{ $type->name }}"  class="w-full py-3 ml-2 text-sm font-medium dark:text-gray-300 rounded-md" />         
          </div>
          @endforeach
        </div>
      </div>
  
      {{-- Property SubType -Input- --}}
      @if ($property_type_id)    
      <div class="pb-4">
        @error('subtype_id')
        <span class="m" role="alert">
          <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
        </span>
        @enderror
        <x-header-label value=" {{ __('Property Sub-type') }} " />

        <div class="flex flex-wrap gap-2">
          @foreach ($subtypes as $type)
          <div class="flex items-center pl-4 border-2 border-gray-400 rounded-md dark:border-gray-700 grow max-w-[200px]">
            <x-radio id="{{ $type->subtype }}" wire:model="subtype_id" value="{{ $type->id }}" name="subtype_id" />
              <x-label value="{{ $type->subtype }}"  for="{{ $type->subtype }}"  class="w-full py-3 ml-2 text-sm font-medium dark:text-gray-300 rounded-md" />
            </div>
           @endforeach
        </div>
      </div>
      @endif
      
  
      {{-- Title -Input- --}}
      <div class="pb-4">
        @error('title')
        <span class="m" role="alert">
          <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
        </span>
        @enderror
        <x-label for="title" value="{{ __('Title') }}"  class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
        <x-input id="title" wire:model="title" name="title" class="block mt-1 w-full" placeholder="e.g. 2 Bedroom apartment with seaside" /> 
      </div>
  
      {{-- Property Description -Input- --}}
      @error('description')
        <span class="m" role="alert">
          <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
        </span>
      @enderror
      <div wire:ignore class="pb-4">
        <x-label for="text_area" value="{{ __('Description') }}" class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
        <textarea wire:model="description" value="" id="text_area"></textarea>
    </div>
    </section>
  
    
    {{-- Property Offer -End Section- --}}

    {{-- Photos, videos and other media -Section- --}}
    <section class="pb-5">
      <x-header-description 
          header="Upload photos, videos and other media" 
          description="Users looking for property ignore properties without photos. Make your property stand out by uploading photos or, even better, a video!" 
      />
  
      {{-- Images --}}
      <div class="pb-4">
        @error('img_file_name')
        <div class="mt-4">
            <span class="text-red-600 mt-5" role="alert">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </span>
        </div>
        @enderror
        <div class="mb-6 pt-4">
          <h3 class="mb-5 block text-m font-semibold text-[#07074D]">
            Upload other media
          </h3>
          <input type="file" name="images" wire:model="img_file_name" id="img_file_name" class="sr-only">
          <label for="images" class="relative flex min-h-[100px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-5 text-center">
            <div>
              <span class="mb-1 block text-m font-semibold text-[#07074D]">
                Drop your images here
              </span>
              <span class="mb-1 block text-m font-medium text-[#6B7280]">
                or
              </span>
              <span class="mb-2 inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                Browse files
              </span>
              <span class="mb-1 block text-sm font-medium text-[#6B7280]">
                Upload photos as jpg or png.
              </span>
            </div>
          </label>
          @if ($img_file_name)
          <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
              @foreach ($img_file_name as $image)
              <div class="flex items-center justify-between">
                <img src="{{ $image->temporaryUrl() }}" alt="" height="70" class="p-2 rounded-sm">
              </div>
              <div class="flex items-center justify-between bg-[#e7e8ea] p-3 rounded-md">
                  <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                    {{ $image->getClientOriginalName() }}
                  </span>
                  <button class="text-[#07074D]" wire:click="removeImage('{{ $image->getFilename() }}')">
                      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.37190 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                          fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                          fill="currentColor" />
                      </svg>
                  </button>
              </div>
              @endforeach
          </div>
          @endif
        </div>
      </div>
      {{-- Image Upload - End Input - --}}
  
      {{-- Media --}}
      <div class="pb-4">
          @error('docs_file_namemedia')
          <div class="mt-4">
              <span class="text-red-600 mt-5" role="alert">
                  <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
              </span>
          </div>
          @enderror
          <div class="mb-6">
            <h3 class="mb-5 block text-m font-semibold text-[#07074D]">
                Upload other media
            </h3>
            <input type="file" name="docs_file_name" wire:model="docs_file_name" id="docs_file_name" class="sr-only">
            <label for="media" class="relative flex min-h-[100px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-5 text-center">
              <div>
                <span class="mb-1 block text-m font-semibold text-[#07074D]">
                  Drop your files here
                </span>
                <span class="mb-1 block text-m font-medium text-[#6B7280]">
                  or
                </span>
                <span class="mb-2 inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                  Browse files
                </span>
                <span class="mb-1 block text-sm font-medium text-[#6B7280]">
                  Upload pdf files.
                </span>
              </div>
            </label>

            @if ($docs_file_name)
            <div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8">
              <div class="flex items-center justify-between">
                <img src="{{ $docs_file_name->temporaryUrl() }}" alt="" height="70" class="p-2 rounded-sm">
              </div>
              <div class="flex items-center justify-between bg-[#e7e8ea] p-3 rounded-md">
                  <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                    {{ $docs_file_name->getClientOriginalName() }}
                  </span>
                  <button class="text-[#07074D]" wire:click="removeMedia">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
                        fill="currentColor" />
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
                        fill="currentColor" />
                    </svg>
                 </button>
              </div>
            </div>
            @endif
          </div>
      </div>
      {{-- Media Upload - End Input - --}}
  
      {{-- YouTube Link --}}
      <div class="pb-4 grow">
        <x-label for="yt_link" value="{{ __('Paste your YouTube video URL and submit') }}"
          class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
        <x-input type="text" name="yt_link" id="yt_link" wire:model="yt_link"
          class="block mt-1 w-full" placeholder="e.g. https://youtube.com/example-link" />
      </div>
  
      {{-- Virtual Tour Link --}}
      <div class="pb-4 grow">
        <x-label for="vt_link" value="{{ __('Paste your Virtual Tour URL and submit') }}"
          class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
        <x-input type="text" name="vt_link" id="vt_link" wire:model="vt_link"
           class="block mt-1 w-full" placeholder="e.g. https://virtualtour.com/example-link" />
      </div>
    </section>

    {{-- Key Information -Section- --}}
    <section class="pb-5">
      <x-header-description 
        header="Add key information" 
        description="Please provide further key information such as the price, number of rooms or availability. Remember, more precise the information - more qualified leads!" 
      />
      
      {{-- Key Infomation --}}
      <div class="pb-4">

        <div class="flex flex-wrap gap-2">
          {{-- Bedroom --}}
          <div class="pb-4 grow">
            @error('bedrooms')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
            <x-label  for="bedrooms" value="{{ __('Bedrooms') }}" class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
            <x-input  type="text"  name="bedrooms"  id="bedrooms" wire:model="bedrooms" class="block mt-1 w-full" />
          </div>

          {{-- Bathroom --}}
          <div class="pb-4 grow">
            @error('bathrooms')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
            <x-label  for="bathrooms" value="{{ __('Bathrooms') }}" class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
            <x-input  type="text"  name="bathrooms"  id="bathrooms" wire:model="bathrooms" class="block mt-1 w-full" />
          </div>

          {{-- Floor Area --}}
          <div class="pb-4 grow">
            @error('floor_area')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
            <x-label  for="floor_area" value="{{ __('Floor Area (m²)') }}" class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
            <x-input  type="text"  name="floor_area"  id="floor_area" wire:model="floor_area" class="block mt-1 w-full" />
          </div>
          
          {{-- Unit/Floor Number --}}
          <div class="pb-4 grow">
            @error('unit_floor_number')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
            <x-label  for="unit_floor_number" value="{{ __('Unit/Floor Number') }}" class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" />
            <x-input  type="text"  name="unit_floor_number"  id="unit_floor_number" wire:model="unit_floor_number" class="block mt-1 w-full" />
          </div>

          
          
        </div>


        {{-- price_availble_ online --}}
        <div class="flex items-middle">
          <div class="flex items-center">
            <x-checkbox id="show_price_online" aria-describedby="show_price_online" wire:model="show_price_online" type="checkbox" value="1" />
          </div>
          <div class="text-sm ml-3">
            <label for="show_price_online" class="font-medium">Show price online</label>
          </div>
        </div>

        {{-- price php --}}
        <div class="pt-4 flex gap-2">
          <div class="pb-4 grow">
            @error('price_php')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
            <x-label 
              for="price_php"
              value="{{ __('Price (₱)') }}"
              class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" 
            />
            <x-input 
              type="text" 
              name="price_php" 
              id="price_php"
              wire:model="price_php"
              class="block mt-1 w-full" 
            />
          </div>
          <div class="pb-4 grow">
            @error('price_usd')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
            <x-label 
              for="price_usd"
              value="{{ __('Price ($)') }}"
              class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" 
            />
            <x-input 
              type="text" 
              name="price_usd" 
              id="price_usd"
              wire:model="price_usd"
              class="block mt-1 w-full" 
            />
          </div>
        </div>

        <div class="pb-4 grow">
          @error('available_from')
            <span class="m" role="alert">
              <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
            </span>
            @enderror
          <x-label 
            for="available_from"
            value="{{ __('Available from') }}"
            class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" 
          />
          <x-input 
            type="date" 
            name="available_from" 
            id="available_from"
            wire:model="available_from"
            class="block mt-1 w-full" 
          />
        </div>

        <div class="pb-4 grow">
          @error('object_id')
          <span class="m" role="alert">
            <strong class="mt-4 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</strong>
          </span>
          @enderror
          <x-label 
            for="object_id"
            value="{{ __('Object ID') }}"
            class="block mb-2 mt-2 text-sm font-medium dark:text-gray-500" 
          />
          <x-input 
            type="text" 
            name="object_id" 
            id="object_id"
            wire:model="object_id"
            class="block mt-1 w-full" 
          />
        </div>
      </div>
    </section>
    {{-- Key Information -End Section- --}}

    {{-- Where the property is located -Section- --}}
    <section class="pb-5">
      <x-header-description 
        header="Where is your property located?" 
        description="For house hunters, location is everything! Give us as much information about the location of your property as you can so that users can find property easily." 
      />

      {{-- Key Infomation --}}
      <div wire:ignore class="pb-4">
        <div class="mt-4">
          <x-label for="region" value="{{ __('Region') }}" />
          <input  type="hidden"  name="region" wire:model="region" />
          <x-select  id="region" autocomplete="region" />
        </div>

        <div class="mt-4">
          <x-label for="province"  value="{{ __('Province') }}" />
          <input type="hidden" name="province" wire:model="province" />
          <x-select id="province" autofocus />
          </select>
        </div>

        <div class="mt-4">
          <x-label  for="city" value="{{ __('City') }}" />
          <input type="hidden" name="city" wire:model="city"/>
          <x-select id="city" autofocus />
        </div>

        <div class="mt-4">
          <x-label  for="barangay" value="{{ __('Barangay') }}" />
          <input  type="hidden"  name="barangay" wire:model="barangay"/>
          <x-select id="barangay" autofocus />
        </div>
        
        <div class="mt-4">
          <x-label 
            for="address" 
            value="{{ __('Address') }}" 
          />
          <x-input 
            type="text" 
            name="address" 
            id="address" 
            wire:model="address" 
            class="block mt-1 w-full" 
            placeholder="Enter street name and number" 
            autocomplete="address"
          />
        </div>
      
        <div class="flex gap-2">
          <div class="mt-4 grow">
              <x-label 
                for="latitude" 
                value="{{ __('Latitude') }}" 
              />
              <x-input 
                type="text" 
                name="latitude"
                id="latitude"
                wire:model="latitude" 
                class="block mt-1 w-full" 
                />
          </div>
          <div class="mt-4 grow">
              <x-label 
                for="longitude" 
                value="{{ __('Longitude') }}" 
              />
              <x-input 
                type="text" 
                name="longitude" 
                id="longitude"
                wire:model="longitude" 
                class="block mt-1 w-full" 
             />
          </div>
        </div>
  
        <div wire:ignore class="mt-4">
          <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
      </div>
    </section>
    {{-- Location -End Section- --}}

    {{-- Amenities -Section- --}}
    @if ($hasIndoorOrOutdoorFeature)    
    <section class="pb-5">
      <x-header-description 
        header="Tell users more about your property" 
        description="Why is your property so great? Tell us more about your property so that property seekers can learn even more about your offer." 
      />
      
      @if ($hasIndoor = true)
      <div class="py-4">
        <h4 class="font-bold text-base">Indoor Features</h4>
        <div class="flex flex-wrap gap-2">
          @foreach ($features as $feat)
          @if ($feat->type == 'indoor')
          <div class="flex items-center pl-4 border-2 bg-slate-800 border-gray-800 rounded-md dark:border-gray-700 grow max-w-[180px]">
            <x-checkbox id="{{ $feat->name }}" wire:model="features_id" value="{{ $feat->id }}" name="offer_type" />
            <x-label value="{{ $feat->name }}" for="{{ $feat->name }}" class="w-full py-2 mx-2 text-sm text-white font-medium dark:text-gray-300 rounded-md" />
          </div>
          @endif
          @endforeach
        </div>
      </div>
      @endif

      @if ($hasOutdoor = true)
      <div class="py-4 font-bold  text-base">
        <h4>Outdoor Features</h4>
        <div class="flex flex-wrap gap-2">
          @foreach ($features as $feat)
          @if ($feat->type == 'outdoor')
          <div class="flex items-center pl-4 border-2 bg-slate-800 border-gray-800 rounded-md dark:border-gray-700 grow max-w-[180px]">
            <x-checkbox id="{{ $feat->name }}" wire:model="features_id" value="{{ $feat->id }}" name="offer_type" />
            <x-label value="{{ $feat->name }}" for="{{ $feat->name }}" class="w-full py-2 mx-2 text-sm text-white font-medium dark:text-gray-300 rounded-md" />
          </div>
          @endif
          @endforeach
        </div>
      </div>
      @endif

    </section>
    @endif
    {{-- Amenities -End Section- --}}

    {{-- Contact Details -Section- --}}
    {{-- Key Infomation --}}
    <section class="pb-5">
        <x-header-description 
          header="Please review your contact details" 
          description="Make sure your details are updated so our users can easily contact you at the right channel." 
        />
      <div class="p-4 border rounded">
        <div class="pb-4 flex items-center border-b">
          <div class="shrink-0  mr-3">
            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
          </div>
          <div class="grow">
            <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
            <hr>
            <h3 class="text-m gray">{{ Auth::user()->email }}</h3>
          </div>
        </div>
        <div class="text-center">
          <h3 class="text-xl font-bold p-5">Available Subscriptions</h3>
          <div class="flex gap-4 text-center justify-evenly">

            <div class="font-bold p-5">
              <div class="flex align-middle items-center text-orange-500">
                <div class="shrink-0 mr-3">
                  <x-heroicon-s-home class="h-8 w-8 rounded-full object-cover"/>
                </div>
                <div class="pl-3 font-bold text-xl ">
                  0
                </div>
              </div>
              Ads Quota
            </div>

            <div class="font-bold p-5">
              <div class="flex align-middle items-center text-green-500">
                <div class="shrink-0 mr-3">
                  <x-heroicon-s-star class="h-8 w-8 rounded-full object-cover"/>
                </div>
                <div class="pl-3 font-bold text-xl">
                  0
                </div>
              </div>
              Highlights
            </div>  
          </div>

          <div class="bg-gray-300 block rounded justify-center">
            <div class="flex justify-center">
              <x-application-logo />
            </div>
            <hr>
            <div class="flex items-middle justify-center py-5">
              <div class="flex items-center h-5">
                <x-checkbox id="highlight_listing" aria-describedby="highlight_listing" type="checkbox"/>
              </div>
              <div class="text-sm ml-3">
                <label for="highlight_listing" class="font-medium">Highlight this listing</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- HERE map API -script-  --}}
    <div wire:ignore>
      <script type="text/javascript" src="{{ asset('js/here-map.js') }}"> </script>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: 'textarea#text_area',
            // Add TinyMCE configuration options as needed
            setup: function (editor) {
                // Listen for changes in the editor content
                editor.on('input', function () {
                    // Get the content from TinyMCE
                    var content = editor.getContent();
                    // Update the Livewire component property
                    @this.set('description', content);
                });
            }
        });
      </script>

      {{-- <script>
        $( "#onclickFile" ).click(function() {
          $( "#output" ).slideUp();
        });
      </script> --}}


    </div>
    {{-- HERE map API -script- -End- --}}

    {{-- Submit Button --}}
    <x-slot name="actions">
      <x-button wire:loading.attr="disabled" onclick="return confirm('Confirm Report Incident?');">
        {{ __('add property') }}
      </x-button>   
    </x-slot>
  </x-slot>
</x-form-section>

 