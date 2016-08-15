# Import scss in folders
require 'sass-globbing'

# Import css into scss
require 'sass-css-importer'
add_import_path Sass::CssImporter::Importer.new("../../thirdparty/")

# Prefixer
require 'autoprefixer-rails'
on_stylesheet_saved do |file|
  css = File.read(file)
  map = file + '.map'

  if File.exists? map
    result = AutoprefixerRails.process(css,
      from: file,
      to:   file,
      map:  { prev: File.read(map), inline: false },
	  browsers: ['> 1%', 'IE > 8'])
    File.open(file, 'w') { |io| io << result.css }
    File.open(map,  'w') { |io| io << result.map }
  else
    File.open(file, 'w') { |io| io << AutoprefixerRails.process(css, browsers: ['> 1%', 'IE > 8']) }
  end
end

# combines duplicate media queries
require 'sass-media_query_combiner'

# Require any additional compass plugins here.
add_import_path "../../thirdparty/"
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "img"
javascripts_dir = "js"
output_style = :compressed
sourcemap = true
line_comments = false
