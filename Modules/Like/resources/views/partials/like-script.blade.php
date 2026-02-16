<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out;
    }
    /* Heart pop animation */
    @keyframes heart-pop {
        0%   { transform: scale(1); }
        50%  { transform: scale(1.4); }
        100% { transform: scale(1); }
    }

    .animate-heart {
        animation: heart-pop 0.3s ease;
    }

</style>
<script>
    // Attach event listener
    function toggleLike(type,id) {
        const isLoggedIn = @json(auth()->check());
        // set dynamically from backend
        if (!isLoggedIn)
        {
            const tooltip = document.getElementById('login-tooltip');
            tooltip.classList.remove('hidden');
            // Hide after 2 seconds
            setTimeout(() => {
                tooltip.classList.add('hidden');
            }, 2000);
        } else {

        fetch("{{ route('like.toggle') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                "Content-Type": "application/json"
            },
            body: JSON.stringify({'type': type, 'id': id})
        })
            .then(response => response.json())
            .then(data => {
                // Example response: { liked: true, count: 1246 }
                const icon = document.getElementById('like-icon');
                const count = document.getElementById('like-count');
                // Update count
                count.textContent = data.count;

                // Toggle icon style
                if (data.liked) {
                    // Trigger animation
                    icon.classList.add('animate-heart');
                    icon.addEventListener('animationend', () => {
                        icon.classList.remove('animate-heart');
                        }, { once: true });
                    icon.classList.remove('far');   // outline heart
                    icon.classList.add('fas', 'text-red-500'); // solid heart
                } else {
                    icon.classList.remove('fas', 'text-red-500');
                    icon.classList.add('far'); // back to outline
                }
            })
            .catch(error => console.error("Error:", error));
    }

    }

    function toggleShareMenu() {
        const menu = document.getElementById('share-menu');
        menu.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('share-menu');
        const button = event.target.closest('button[onclick="toggleShareMenu()"]');
        if (!button && !event.target.closest('#share-menu')) {
            menu.classList.add('hidden');
        }
    });

    // Combined share logic
    function shareQuick(platform) {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("Check out this blog!");

        // First try Web Share API
        if (navigator.share) {
            navigator.share({
                title: document.title,
                text: "Check out this blog!",
                url: window.location.href
            }).catch(err => console.log("Share cancelled:", err));
            return;
        }

        // Fallback: custom links
        let shareUrl = "";
        switch(platform) {
            case "twitter":
                shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${text}`;
                break;
            case "facebook":
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                break;
            case "linkedin":
                shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                break;
            case "whatsapp":
                shareUrl = `https://api.whatsapp.com/send?text=${text}%20${url}`;
                break;
        }
        window.open(shareUrl, "_blank", "width=600,height=400");
    }
    // Copy link
    function copyLink()
    {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert("لینک کپی شد!");
        }).catch(err => { console.error("Failed to copy:", err); }); }

</script>
