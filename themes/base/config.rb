# Extra Requirments
require 'sass-css-importer'
require 'sass-globbing'
require 'sass-media_query_combiner'

# Require any additional compass plugins here.
add_import_path Sass::CssImporter::Importer.new("../../thirdparty/")
add_import_path "../../thirdparty/"
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "img"
javascripts_dir = "js"
output_style = :compressed
sourcemap = true
line_comments = false
