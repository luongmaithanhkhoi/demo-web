<link rel="stylesheet" href="../css/style1.css">
<div class="download_page my-2">
   <div class="container">              
        <div class="information-box mt-3">
            <div class="row">
                <div class="col-lg-6 d-none d-md-flex">
                    <img src="{{ asset('images/sections/download.svg') }}" width="100%">
                </div>
                <div class="col-lg-6">
                    <ul class="list-group bg-white no-rounded">
                    <li class="list-group-item do-cap"><strong>{{__('File name :')}}</strong><span class="pull-right">{{ shortertext($file->main_filename, 20) }}</span></li>
                    <li class="list-group-item do-cap"><strong>{{__('File format :')}}</strong><span class="pull-right">{{ $file->file_type }}</span></li>
                    <li class="list-group-item do-cap"><strong>{{__('Downloads :')}}</strong><span class="pull-right">{{ $file->downloads }}</span></li>
                    <li class="list-group-item do-cap"><strong>{{__('Upload date :')}}</strong><span class="pull-right">@datetime($file->created_at)</span></li>
                    </ul>
                </div>
            </div>
        </div>
        @if($ads->download_left_bottom_ads != null)
        <div class="mobile-ads-bottom d-block d-md-none mb-3 mt-3">
            <div class="downoad_ads_bottom">
                {!! $ads->download_left_bottom_ads !!}
            </div>
        </div>
        @endif
        <div class="file-description mt-3">
            <h2>{{__('About ')}}{{ shortertext($file->main_filename, 20) }}</h2>
            <p>{{__('The name of this file is ')}}{{ $file->main_filename }}{{__(', which is a ')}}{{ $file->file_type }}{{__(' format, and it is one of the files that can be downloaded and used easily. You can upload similar files without the need for an account, or you can create an account on the site and you will be able to manage your files easily. The site supports many file formats. You can upload your files. Share it anywhere and download it anytime.')}}</p>
            <div class="file-link">
                <h2>{{__('Share link :')}}</h2>
                <div class="input-group">
                    <input type="text" class="form-control sharelink" id="sharelink" value="{{ route('download.file', $file->file_id) }}" readonly>
                    <button class="btn" id="copy">{{__('Copy')}}</button>
                </div>
            </div>
        </div>
    </div>  
</div>