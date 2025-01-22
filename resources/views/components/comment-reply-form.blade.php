@props(['post', 'parentId' => null])

<form method="POST" 
      action="{{ route('comments.store', $post) }}" 
      class="{{ $parentId ? 'mt-2' : 'mb-8' }}">
    @csrf

    @if($parentId)
        <input type="hidden" name="parent_id" value="{{ $parentId }}">
    @endif

    <div class="mb-4">
        <textarea name="content" 
                  rows="2" 
                  class="w-full px-3 py-2 border rounded" 
                  placeholder="{{ $parentId ? 'Write a reply...' : 'Write a comment...' }}" 
                  required></textarea>
    </div>

    <div class="flex justify-end space-x-2">
        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded transition-all hover:bg-teal-600">
            {{ $parentId ? 'Reply' : 'Post Comment' }}
        </button>
    </div>
</form>
