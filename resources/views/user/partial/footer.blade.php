<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer__contacts">
                <p>{{ $language->footer->contactTitle }}</p>
                <div class="footer__contacts-item">
                    <a href={{ 'mailto:' . $language->footer->email}}>{{ $language->footer->email }}</a>
                </div>
                <div class="footer__contacts-item">
                    <a href="{{ 'tel:' . $language->footer->phone }}">{{ $language->footer->phone }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
