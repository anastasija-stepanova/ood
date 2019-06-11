using System.Windows.Forms;
using lab9.Model;

namespace lab9.Util
{
    public static class Utils
    {
        public static double? ProcessTextBoxStringValue( string value )
        {
            return double.TryParse( value, out double result ) ? ( double? ) result : null;
        }

        public static bool CanProcessTextBoxStringValue( TextBox textBox, int selectedItem )
        {
            return textBox.Focused && !string.IsNullOrEmpty( textBox.Text ) && selectedItem != -1;
        }

        public static string ConvertHarmonicToStr(IHarmonicView harmonic)
        {
            return $"{harmonic.GetAmplitude()}*{harmonic.GetHarmonicKind().ToString()}({harmonic.GetFrequency()}*x+{harmonic.GetPhase()})";
        }
    }
}
