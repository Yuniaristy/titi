<x-template-layout>
                <h1 class="text-3xl text-black pb-6">{{$title}}</h1>
            <div>
            <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 sm:br-gray-100">
            <form action="{{(isset($penduduk))?route('penduduk.update',$penduduk->id):route('penduduk.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($penduduk))
        @method('PUT')
    @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700">Nama penduduk</label>
                <input type="text" name="nama" id="nama" autocomplete="family-name" value="{{(isset($penduduk))?$penduduk->nama:old('nama') }}" class="mt-1  @error('nama') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik nama">
              <div class="text-xs text-red-600">@error('nama'){{$message}} @enderror</div>
              </div>
            </div>
            <div>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="nik" class="block text-sm font-medium text-gray-700">
                                NIK
                            </label>
                            <input type="text" name="nik" id="nik" autocomplete="family-name" value="{{(isset($penduduk))?$penduduk->nik:old('nik') }}" class="mt-1  @error('nik') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik nik">
              <div class="text-xs text-red-600">@error('nik'){{$message}} @enderror</div>
                        </div>
                        </div><br>
            <div>
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
                                Jenis Kelamin
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="jk" id="jk" class="@error('jk') border-red-600 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                                    <option value="">Masukan Pilihan</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    </select>
                            </div>
                            <div class="text-xs text-red-500"> @error('jk') {{$message}} @enderror</div>
                        </div>
                        </div><br>
                     <div>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">
                                alamat
                            </label>
                            <input type="text" name="alamat" id="alamat" autocomplete="family-name" value="{{(isset($penduduk))?$penduduk->alamat:old('alamat') }}" class="mt-1  @error('alamat') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik alamat sesuai domisili">
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