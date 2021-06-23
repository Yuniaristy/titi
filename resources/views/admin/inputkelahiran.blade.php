<x-template-layout>
                <h1 class="text-3xl text-black pb-6">{{$title}}</h1>
            <div>
            <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 sm:br-gray-100">
            <form action="{{(isset($kelahiran))?route('kelahiran.update',$kelahiran->id):route('kelahiran.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($kelahiran))
        @method('PUT')
    @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
           <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                <input type="text" name="namaibu" id="namaibu" autocomplete="family-name" value="{{(isset($kelahiran))?$kelahiran->namaibu:old('namaibu') }}" class="mt-1  @error('namaibu') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik nama ibu">
              <div class="text-xs text-red-600">@error('namaibu'){{$message}} @enderror</div>
              </div>
            </div>
            <div><br>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="namabapak" class="block text-sm font-medium text-gray-700">Nama bapak</label>
                <input type="text" name="namabapak" id="namabapak" autocomplete="family-name" value="{{(isset($kelahiran))?$kelahiran->namabapak:old('namabapak') }}" class="mt-1  @error('namabapak') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik nama bapak">
              <div class="text-xs text-red-600">@error('namabapak'){{$message}} @enderror</div>
              </div>
            </div>
            <div><br>

            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700">Nama Anak</label>
                <input type="text" name="namaanak" id="namaanak" autocomplete="family-name" value="{{(isset($kelahiran))?$kelahiran->namaanak:old('namaanak') }}" class="mt-1  @error('namaanak') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik nama anak">
              <div class="text-xs text-red-600">@error('namaanak'){{$message}} @enderror</div>
              </div>
            </div>
            <div>
<br>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">
                                Tanggal Kegiatan
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="date" name="tanggal" id="tanggal" class="@error('tanggal') border-red-600 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300  text-black">
                            </div>
                            <div class="text-xs text-red-500"> @error('tanggal') {{$message}} @enderror</div>
                        </div>
                    </div><br>
                    <div>
                    <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">
                                Agama
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="agama" id="agama" class="@error('agama') border-red-600 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                                    <option value="">Masukan Pilihan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Islam">Islam</option>
                                      <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    </select>
                            </div>
                            <div class="text-xs text-red-500"> @error('agama') {{$message}} @enderror</div>
                        </div>
                        </div><br>
                     <div>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">
                                alamat
                            </label>
                            <input type="text" name="alamat" id="alamat" autocomplete="family-name" value="{{(isset($kelahiran))?$kelahiran->alamat:old('alamat') }}" class="mt-1  @error('alamat') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik alamat sesuai domisili">
              <div class="text-xs text-red-600">@error('alamat'){{$message}} @enderror</div>
                        </div>
                        </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
                   
                 </div>
            </div>
</x-template-layout>