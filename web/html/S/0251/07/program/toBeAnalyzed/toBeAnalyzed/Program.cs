using System;

namespace toBeAnalyzed
{
    internal class Program
    {
        static void Main(string[] args)
        {
            string sql = "";
            string id;
            id = dangerous.read();

            sql += " SELECT * ";
            sql += " FROM table ";
            sql += "WHERE id = '" + id + "';";

            Console.WriteLine(sql);
        }
    }
}
