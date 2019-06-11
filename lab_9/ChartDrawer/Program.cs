using System;
using System.Windows.Forms;
using lab9.Model;
using lab9.View;

namespace lab9
{
    static class Program
    {
        /// <summary>
        /// Главная точка входа для приложения.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault( false );
            var harmonicContainer = new HarmonicContainer();
            var menuController = new Controller.MenuController( harmonicContainer );            
            Application.Run(menuController.MenuView );
        }
    }
}
