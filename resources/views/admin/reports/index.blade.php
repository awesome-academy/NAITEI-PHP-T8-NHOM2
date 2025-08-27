<x-admin-layout>
  <div class="py-8">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow sm:rounded-lg">
        <div class="p-6">
          <h1 class="text-xl font-semibold mb-4">{{ __('common.reports_daily_title') }}</h1>

          @if($files->isEmpty())
            <p class="text-gray-600">{{ __('common.no_reports') }}</p>
          @else
            <div class="overflow-x-auto">
              <table class="min-w-full text-sm">
                <thead>
                  <tr class="border-b">
                    <th class="text-left py-2 px-3">{{ __('common.date') }}</th>
                    <th class="text-left py-2 px-3">{{ __('common.updated_at') }}</th>
                    <th class="text-left py-2 px-3">{{ __('common.size') }}</th>
                    <th class="text-left py-2 px-3">{{ __('common.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($files as $f)
                  <tr class="border-b">
                    <td class="py-2 px-3 font-medium">{{ $f['date'] }}</td>
                    <td class="py-2 px-3">{{ $f['modified']->format('Y-m-d H:i') }}</td>
                    <td class="py-2 px-3">{{ __('common.bytes', ['n' => number_format($f['size'])]) }}</td>
                    <td class="py-2 px-3">
                      <a class="text-blue-600 hover:underline"
                         href="{{ route('admin.reports.download', $f['date']) }}">
                        {{ __('common.download') }}
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
