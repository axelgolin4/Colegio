import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                success: '#28a745',    
                warning: '#ffc107',    
                danger: '#dc3545',     
                info: '#17a2b8',       
                primary: '#007bff',    
                secondary: '#6c757d',  
                customColor: '#ff6347', 
                darkBlue: '#1e3a8a',    
            },
        },
    },
}
