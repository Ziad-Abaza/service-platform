<div class="flex items-center gap-2">
    <span class="text-sm text-gray-600 dark:text-gray-400">{{ __('Language') }}:</span>
    <div class="flex gap-2">
        <a href="{{ route('locale.switch', 'en') }}"
            class="text-sm {{ app()->getLocale() === 'en' ? 'font-bold text-blue-600 dark:text-blue-400' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' }}">
            🇬🇧 English
        </a>
        <span class="text-gray-400">|</span>
        <a href="{{ route('locale.switch', 'ar') }}"
            class="text-sm {{ app()->getLocale() === 'ar' ? 'font-bold text-blue-600 dark:text-blue-400' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' }}">
            🇸🇦 العربية
        </a>
    </div>
</div>