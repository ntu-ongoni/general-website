# Ntu-Ongoni Website Template

A modern, responsive website template for the Ntu-Ongoni organization, featuring informational content and fundraising capabilities.

## Features

- **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Fundraising Integration**: Ready-to-use donation forms and payment processing structure
- **Information Sections**: About, Programs, Impact, and Contact sections
- **Interactive Elements**: Mobile navigation, smooth scrolling, form validation
- **SEO Optimized**: Proper HTML structure and meta tags
- **Accessibility**: ARIA labels and keyboard navigation support

## File Structure

```
general-website/
├── index.html              # Main homepage
├── donate.html             # Donation processing page
├── process-form.php        # Form handling (backend)
├── css/
│   └── styles.css          # Main stylesheet
├── js/
│   └── script.js           # Interactive functionality
├── img/
│   └── ntu-ongoni-emblem.jpg  # Organization emblem
└── README.md               # This file
```

## Setup Instructions

### 1. Basic Setup (Static Website)

1. **Upload Files**: Upload all files to your web hosting service
2. **Replace Emblem**: Replace `img/ntu-ongoni-emblem.jpg` with your organization's emblem
3. **Update Content**: Edit `index.html` to customize:
   - Organization name and description
   - Contact information
   - Program details
   - Impact statistics
4. **Customize Colors**: Modify CSS color scheme in `css/styles.css` if needed

### 2. Advanced Setup (With Form Processing)

For form functionality, you'll need:
- Web hosting with PHP support
- Email service configuration
- Payment processor integration (Stripe, PayPal, etc.)

#### Email Configuration
1. Edit `process-form.php`
2. Replace `info@ntu-ongoni.org` with your actual email
3. Configure your server's mail settings

#### Payment Integration
1. Sign up with a payment processor (Stripe, PayPal, etc.)
2. Integrate their API with the donation forms
3. Update the payment methods in `donate.html`

### 3. Customization

#### Colors and Branding
The website uses a blue color scheme that can be easily customized:
- Primary color: `#2c5aa0`
- Secondary color: `#1e3d72`
- Modify these in `css/styles.css`

#### Content Updates
1. **Hero Section**: Update title, subtitle, and call-to-action
2. **About Section**: Replace mission, vision, and statistics
3. **Programs**: Update program descriptions and icons
4. **Contact Info**: Update address, phone, and email

#### Images
- Replace the emblem with your organization's logo
- Add additional images for programs and impact sections
- Optimize images for web (recommended: JPG/PNG, max 1MB)

## Browser Support

- Chrome 80+
- Firefox 75+
- Safari 13+
- Edge 80+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- Optimized CSS and JavaScript
- Lazy loading for images
- Compressed assets
- Responsive images

## Security Features

- Input sanitization
- CSRF protection (in PHP forms)
- XSS prevention
- Secure form handling

## SEO Features

- Semantic HTML structure
- Meta tags optimization
- Open Graph tags
- Structured data markup
- Fast loading times

## Accessibility

- ARIA labels and roles
- Keyboard navigation
- Screen reader compatibility
- High contrast support
- Alternative text for images

## Development

### Local Development
1. Use a local server (XAMPP, WAMP, or VS Code Live Server)
2. Open `index.html` in your browser
3. Test all forms and interactive elements

### Deployment Checklist
- [ ] Update all contact information
- [ ] Replace placeholder content
- [ ] Test forms with real email addresses
- [ ] Configure payment processing
- [ ] Test on multiple devices and browsers
- [ ] Optimize images
- [ ] Set up SSL certificate
- [ ] Configure backup system

## Support and Updates

For technical support or customization requests, contact your web development team or refer to the documentation of your hosting provider.

## License

This template is created for the Ntu-Ongoni organization. Modify and use as needed for your organization's website.

---

Built with ❤️ for community empowerment
